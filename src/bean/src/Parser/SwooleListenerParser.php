<?php

namespace Swoft\Bean\Parser;

use Swoft\Bean\Annotation\Scope;
use Swoft\Bean\Collector\SwooleListenerCollector;

class SwooleListenerParser extends AbstractParser
{

    public function parser(
        string $className,
        $objectAnnotation = null,
        string $propertyName = '',
        string $methodName = '',
        $propertyValue = null
    ): array {
        $beanName = $className;
        $scope = Scope::SINGLETON;

        SwooleListenerCollector::collect($className, $objectAnnotation, $propertyName, $methodName, $propertyValue);

        return [$beanName, $scope, ''];
    }
}