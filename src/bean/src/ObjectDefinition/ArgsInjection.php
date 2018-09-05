<?php

namespace Swoft\Bean\ObjectDefinition;

/**
 * 数组属性的参数或构造函数的参数注入对象
 */
class ArgsInjection
{
    /**
     * 参数值
     *
     * @var mixed
     */
    private $value;

    /**
     * 是否是bean引用
     *
     * @var bool
     */
    private $ref;

    public function __construct($value, $ref = false)
    {
        $this->value = $value;
        $this->ref = $ref;
    }

    /**
     * 参数值
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * 参数是否是bean引用
     */
    public function isRef(): bool
    {
        return $this->ref;
    }
}
