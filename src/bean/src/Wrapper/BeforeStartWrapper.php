<?php

namespace Swoft\Bean\Wrapper;

use Swoft\Bean\Annotation\BeforeStart;
use Swoft\Bean\Annotation\Inject;

class BeforeStartWrapper extends AbstractWrapper
{
    /**
     * @var array
     */
    protected $classAnnotations = [
        BeforeStart::class,
    ];

    /**
     * @var array
     */
    protected $propertyAnnotations = [
        Inject::class,
    ];

    /**
     * 是否解析类注解
     */
    public function isParseClassAnnotations(array $annotations): bool
    {
        return isset($annotations[BeforeStart::class]);
    }

    /**
     * 是否解析属性注解
     */
    public function isParsePropertyAnnotations(array $annotations): bool
    {
        return isset($annotations[Inject::class]);
    }

    /**
     * 是否解析方法注解
     */
    public function isParseMethodAnnotations(array $annotations): bool
    {
        return false;
    }
}