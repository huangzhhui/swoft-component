<?php

namespace Swoft\Bean\Parser;

use Swoft\Bean\Annotation\Scope;
use Swoft\Bean\Collector\ListenerCollector;

class ListenerParser extends AbstractParser
{

    public function parser(
        string $className,
        $objectAnnotation = null,
        string $propertyName = '',
        string $methodName = '',
        $propertyValue = null
    ): array {
        ListenerCollector::collect($className, $objectAnnotation, $propertyName, $methodName, $propertyValue);
        return [$className, Scope::SINGLETON, ''];
    }
}
