<?php

namespace Swoft\Bean\Parser;

use Swoft\Bean\Collector\ValidatorCollector;

class FloatsParser extends AbstractParser
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
