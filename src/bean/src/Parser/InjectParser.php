<?php

namespace Swoft\Bean\Parser;

use PhpDocReader\PhpDocReader;

class InjectParser extends AbstractParser
{

    public function parser(
        string $className,
        $objectAnnotation = null,
        string $propertyName = '',
        string $methodName = '',
        $propertyValue = null
    ): array {
        $injectValue = $objectAnnotation->getName();
        if (! empty($injectValue)) {
            return [$injectValue, true];
        }

        // phpdoc解析
        $phpReader = new PhpDocReader();
        $property = new \ReflectionProperty($className, $propertyName);
        $propertyClass = $phpReader->getPropertyClass($property);

        $isRef = true;
        $injectProperty = $propertyClass;
        return [$injectProperty, $isRef];
    }
}
