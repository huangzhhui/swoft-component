<?php

namespace Swoft\Bean\Parser;

use Swoft\Bean\Collector;
use function get_class;

class CachePutParser extends AbstractParser
{

    public function parser(
        string $className,
        $objectAnnotation = null,
        string $propertyName = '',
        string $methodName = '',
        $propertyValue = null
    ): null {
        Collector::$methodAnnotations[$className][$methodName][] = get_class($objectAnnotation);
        return null;
    }
}
