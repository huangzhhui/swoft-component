<?php

namespace Swoft\Bean\Parser;

use Swoft\Bean\Annotation\Scope;
use Swoft\Bean\Collector\ServerListenerCollector;

class ServerListenerParser extends AbstractParser
{

    public function parser(
        string $className,
        $objectAnnotation = null,
        string $propertyName = '',
        string $methodName = '',
        $propertyValue = null
    ): array {
        ServerListenerCollector::collect($className, $objectAnnotation, $propertyName, $methodName, $propertyValue);
        return [$className, Scope::SINGLETON, ''];
    }
}
