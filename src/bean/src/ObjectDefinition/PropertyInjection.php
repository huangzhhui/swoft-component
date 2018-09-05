<?php

namespace Swoft\Bean\ObjectDefinition;

/**
 * 属性注入对象
 */
class PropertyInjection
{
    /**
     * 属性名称
     *
     * @var string
     */
    private $propertyName;

    /**
     * 属性值
     *
     * @var mixed
     */
    private $value;

    /**
     * 是否是bean引用
     */
    private $ref = false;

    public function __construct(string $propertyName, $value, $ref = false)
    {
        $this->propertyName = $propertyName;
        $this->value = $value;
        $this->ref = $ref;
    }

    /**
     * 获取属性名称
     */
    public function getPropertyName(): string
    {
        return $this->propertyName;
    }

    /**
     * 获取属性值
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * 属性是否是bean引用
     */
    public function isRef(): bool
    {
        return $this->ref;
    }
}
