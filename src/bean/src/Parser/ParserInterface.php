<?php

namespace Swoft\Bean\Parser;

/**
 * Annotation Parser Interface
 */
interface ParserInterface
{

    public function parser(
        string $className,
        $objectAnnotation = null,
        string $propertyName = '',
        string $methodName = '',
        $propertyValue = null
    );
}
