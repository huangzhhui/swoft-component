<?php

namespace Swoft\Bean\Parser;

use Swoft\Bean\Annotation\Scope;
use Swoft\Bean\Collector\PoolCollector;

class PoolParser extends AbstractParser
{

    public function parser(
        string $className,
        $objectAnnotation = null,
        string $propertyName = '',
        string $methodName = '',
        $propertyValue = null
    ): array {

        PoolCollector::collect($className, $objectAnnotation, $propertyName, $methodName, $propertyValue);
        return [$className, Scope::SINGLETON, ''];
    }
}
