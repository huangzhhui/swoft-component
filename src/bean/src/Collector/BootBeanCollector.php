<?php

namespace Swoft\Bean\Collector;

use Swoft\Bean\Annotation\BootBean;
use Swoft\Bean\CollectorInterface;

class BootBeanCollector implements CollectorInterface
{

    const TYPE_SERVER = 'server';
    const TYPE_WORKER = 'worker';

    private static $bootBeans = [];

    public static function collect(
        string $className,
        $objectAnnotation = null,
        string $propertyName = '',
        string $methodName = '',
        $propertyValue = null
    ) {
        if ($objectAnnotation instanceof BootBean) {
            if ($objectAnnotation->isServer()) {
                self::$bootBeans[self::TYPE_SERVER][] = $className;
            } else {
                self::$bootBeans[self::TYPE_WORKER][] = $className;
            }
        }
    }

    public static function getCollector(): array
    {
        return self::$bootBeans;
    }
}