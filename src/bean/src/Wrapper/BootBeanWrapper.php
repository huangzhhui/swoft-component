<?php

namespace Swoft\Bean\Wrapper;

use Swoft\Bean\Annotation\BootBean;
use Swoft\Bean\Annotation\Inject;
use Swoft\Bean\Annotation\Value;

class BootBeanWrapper extends AbstractWrapper
{
    /**
     * @var array
     */
    protected $classAnnotations = [
        BootBean::class
    ];

    /**
     * @var array
     */
    protected $propertyAnnotations = [
        Inject::class,
        Value::class,
    ];

    /**
     * 是否解析类注解
     */
    public function isParseClassAnnotations(array $annotations): bool
    {
        return isset($annotations[BootBean::class]);
    }

    /**
     * 是否解析属性注解
     */
    public function isParsePropertyAnnotations(array $annotations): bool
    {
        return isset($annotations[Inject::class]) || isset($annotations[Value::class]);
    }

    /**
     * 是否解析方法注解
     */
    public function isParseMethodAnnotations(array $annotations): bool
    {
        return false;
    }
}