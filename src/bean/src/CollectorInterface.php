<?php

namespace Swoft\Bean;

/**
 * Annotaions Data Collector Interface
 */
interface CollectorInterface
{
    /**
     * @return mixed
     */
    public static function collect(
        string $className,
        $objectAnnotation = null,
        string $propertyName = '',
        string $methodName = '',
        $propertyValue = null
    );

    /**
     * @return mixed
     */
    public static function getCollector();
}