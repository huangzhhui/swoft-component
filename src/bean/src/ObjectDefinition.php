<?php

namespace Swoft\Bean;

use Swoft\Bean\Annotation\Scope;
use Swoft\Bean\ObjectDefinition\MethodInjection;

/**
 * Definition of bean object
 */
class ObjectDefinition
{
    /**
     * Entry name (most of the time, same as $classname).
     *
     * @var string
     */
    private $name;

    /**
     * Class name (if null, then the class name is $name).
     *
     * @var string|null
     */
    private $className;

    /**
     * @var int
     */
    private $scope = Scope::SINGLETON;

    /**
     * Referenced bean, default is null
     *
     * @var string|null
     */
    private $ref;

    /**
     * Constructor parameter injection.
     *
     * @var MethodInjection|null
     */
    private $constructorInjection = null;

    /**
     * Property injections.
     *
     * @var array
     */
    private $propertyInjections = [];

    /**
     * Method calls.
     *
     * @var MethodInjection[][]
     */
    private $methodInjections = [];

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getClassName(): string
    {
        return $this->className;
    }

    public function setClassName(string $className)
    {
        $this->className = $className;
    }

    public function getScope(): int
    {
        return $this->scope;
    }


    /**
     * @return string|null
     */
    public function getRef()
    {
        return $this->ref;
    }

    public function setRef(string $ref): self
    {
        $this->ref = $ref;
        return $this;
    }

    public function setScope(int $scope): self
    {
        $this->scope = $scope;
        return $this;
    }

    /**
     * 获取构造函数注入对象
     *
     * @return MethodInjection|null
     */
    public function getConstructorInjection()
    {
        return $this->constructorInjection;
    }

    /**
     * 设置构造函数注入对象
     */
    public function setConstructorInjection(MethodInjection $constructorInjection)
    {
        $this->constructorInjection = $constructorInjection;
    }

    /**
     * 获取属性注入对象
     *
     * @return mixed
     */
    public function getPropertyInjections()
    {
        return $this->propertyInjections;
    }

    /**
     * 设置属性注入对象
     *
     * @param mixed $propertyInjections
     */
    public function setPropertyInjections($propertyInjections)
    {
        $this->propertyInjections = $propertyInjections;
    }

    /**
     * 获取方法注入对象
     *
     * @return ObjectDefinition\MethodInjection[][]
     */
    public function getMethodInjections(): array
    {
        return $this->methodInjections;
    }

    /**
     * 设置方法注入对象
     *
     * @param ObjectDefinition\MethodInjection[][] $methodInjections
     */
    public function setMethodInjections(array $methodInjections)
    {
        $this->methodInjections = $methodInjections;
    }
}
