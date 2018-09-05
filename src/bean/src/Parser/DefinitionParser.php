<?php

namespace Swoft\Bean\Parser;

use Swoft\Bean\Annotation\Scope;
use Swoft\Bean\Collector\DefinitionCollector;

class DefinitionParser extends AbstractParser
{

    public function parser(
        string $className,
        $objectAnnotation = null,
        string $propertyName = '',
        string $methodName = '',
        $propertyValue = null
    ): array {
        $beanName = $objectAnnotation->getName();
        $beanName = empty($beanName) ? $className : $beanName;
        $scope = Scope::SINGLETON;

        DefinitionCollector::collect($className, $objectAnnotation, $propertyName, $methodName, $propertyValue);

        return [$beanName, $scope, ''];
    }
}