<?php

namespace Swoft\Bean\Wrapper;

use Swoft\Bean\Annotation\Definition;

class DefinitionWrapper extends AbstractWrapper
{
    /**
     * @var array
     */
    protected $classAnnotations = [
        Definition::class,
    ];

    /**
     * 是否解析类注解
     */
    public function isParseClassAnnotations(array $annotations): bool
    {
        return isset($annotations[Definition::class]);
    }

    /**
     * 是否解析属性注解
     */
    public function isParsePropertyAnnotations(array $annotations): bool
    {
        return false;
    }

    /**
     * 是否解析方法注解
     */
    public function isParseMethodAnnotations(array $annotations): bool
    {
        return false;
    }
}