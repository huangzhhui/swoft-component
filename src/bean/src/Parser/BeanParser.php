<?php

namespace Swoft\Bean\Parser;

class BeanParser extends AbstractParser
{

    public function parser(
        string $className,
        $objectAnnotation = null,
        string $propertyName = '',
        string $methodName = '',
        $propertyValue = null
    ): array {
        $name = $objectAnnotation->getName();
        $scope = $objectAnnotation->getScope();
        $ref = $objectAnnotation->getRef();
        $beanName = empty($name) ? $className : $name;

        return [$beanName, $scope, $ref];
    }
}
