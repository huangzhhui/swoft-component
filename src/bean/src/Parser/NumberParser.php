<?php

namespace Swoft\Bean\Parser;

use Swoft\Bean\Collector\ValidatorCollector;

class NumberParser extends AbstractParser
{

    public function parser(
        string $className,
        $objectAnnotation = null,
        string $propertyName = '',
        string $methodName = '',
        $propertyValue = null
    ): null {
        ValidatorCollector::collect($className, $objectAnnotation, $propertyName, $methodName, $propertyValue);
        return null;
    }
}
