<?php

namespace Swoft\Bean\Parser;

use Swoft\Bean\Annotation\Scope;
use Swoft\Bean\Collector\BootstrapCollector;

class BootstrapParser extends AbstractParser
{

    public function parser(
        string $className,
        $objectAnnotation = null,
        string $propertyName = '',
        string $methodName = '',
        $propertyValue = null
    ): array {
        BootstrapCollector::collect($className, $objectAnnotation, $propertyName, $methodName, $propertyValue);
        return [$className, Scope::SINGLETON, ''];
    }
}