<?php

namespace Swoft\Bean\Collector;

use Swoft\Bean\Annotation\Bootstrap;
use Swoft\Bean\CollectorInterface;

class BootstrapCollector implements CollectorInterface
{

    private static $bootstraps = [];

    public static function collect(
        string $className,
        $objectAnnotation = null,
        string $propertyName = '',
        string $methodName = '',
        $propertyValue = null
    ) {
        if ($objectAnnotation instanceof Bootstrap) {
            self::$bootstraps[$className]['name'] = $objectAnnotation->getName();
            self::$bootstraps[$className]['order'] = $objectAnnotation->getOrder();
        }
    }

    public static function getCollector()
    {
        return self::$bootstraps;
    }

}
