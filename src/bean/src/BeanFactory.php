<?php

namespace Swoft\Bean;

use Swoft\Aop\Aop;
use Swoft\Bean\Collector\BootBeanCollector;
use Swoft\Bean\Collector\DefinitionCollector;
use Swoft\Core\Config;
use Swoft\Helper\ArrayHelper;
use Swoft\Helper\DirHelper;
use function is_readable;

class BeanFactory implements BeanFactoryInterface
{
    /**
     * @var Container Bean container
     */
    private static $container;

    /**
     * Init beans
     *
     * @throws \InvalidArgumentException
     * @throws \ReflectionException
     */
    public static function init()
    {
        $properties = self::getProperties();

        self::$container = new Container();
        self::$container->setProperties($properties);
        self::$container->autoloadServerAnnotation();

        $definition = self::getServerDefinition();
        self::$container->addDefinitions($definition);
        self::$container->initBeans();
    }

    /**
     * Reload bean definitions
     *
     * @param array $definitions append definitions to config loader
     * @throws \ReflectionException
     */
    public static function reload(array $definitions = [])
    {
        $properties = self::getProperties();
        $workerDefinitions = self::getWorkerDefinition();
        $definitions = ArrayHelper::merge($workerDefinitions, $definitions);

        self::$container->setProperties($properties);
        self::$container->addDefinitions($definitions);
        self::$container->autoloadWorkerAnnotation();

        $componentDefinitions = self::getComponentDefinitions();
        self::$container->addDefinitions($componentDefinitions);

        /* @var Aop $aop Init reload AOP */
        $aop = self::getBean(Aop::class);
        $aop->init();

        self::$container->initBeans();
    }

    /**
     * Get bean from container
     *
     * @param string $name Bean name
     * @return mixed
     */
    public static function getBean(string $name)
    {
        return self::$container->get($name);
    }

    /**
     * Determine if bean exist in container
     *
     * @param string $name Bean name
     */
    public static function hasBean(string $name): bool
    {
        return self::$container->hasBean($name);
    }

    private static function getWorkerDefinition(): array
    {
        $configDefinitions = [];
        $beansDir = alias('@beans');

        if (is_readable($beansDir)) {
            $config = new Config();
            $config->load($beansDir, [], DirHelper::SCAN_BFS, Config::STRUCTURE_MERGE);
            $configDefinitions = $config->toArray();
        }

        $coreBeans = self::getCoreBean(BootBeanCollector::TYPE_WORKER);

        return ArrayHelper::merge($coreBeans, $configDefinitions);
    }

    /**
     * @throws \InvalidArgumentException
     */
    private static function getServerDefinition(): array
    {
        $file = alias('@console');
        $configDefinition = [];

        if (is_readable($file)) {
            $configDefinition = require_once $file;
        }

        $coreBeans = self::getCoreBean(BootBeanCollector::TYPE_SERVER);

        return ArrayHelper::merge($coreBeans, $configDefinition ? : []);
    }

    private static function getProperties(): array
    {
        $properties = [];
        $config = new Config();
        $dir = alias('@properties');

        if (is_readable($dir)) {
            $config->load($dir);
            $properties = $config->toArray();
        }

        return $properties;
    }

    private static function getCoreBean(string $type): array
    {
        $collector = BootBeanCollector::getCollector();
        if (! isset($collector[$type])) {
            return [];
        }

        $coreBeans = [];
        $bootBeans = $collector[$type];
        foreach ($bootBeans ?? [] as $beanName) {
            /* @var \Swoft\Core\BootBeanInterface $bootBean */
            $bootBean = self::getBean($beanName);
            $beans = $bootBean->beans();
            $coreBeans = ArrayHelper::merge($coreBeans, $beans);
        }

        return $coreBeans;
    }

    private static function getComponentDefinitions(): array
    {
        $definitions = [];
        $collector = DefinitionCollector::getCollector();

        foreach ($collector as $className => $beanName) {
            /* @var \Swoft\Bean\DefinitionInterface $definition */
            $definition = self::getBean($beanName);
            $definitions = ArrayHelper::merge($definitions, $definition->getDefinitions());
        }

        return $definitions;
    }

    public static function getContainer(): Container
    {
        return self::$container;
    }
}
