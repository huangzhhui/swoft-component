<?php

namespace Swoft\Bean\ObjectDefinition;

/**
 * 方法注入对象
 */
class MethodInjection
{
    /**
     * 方法名称
     *
     * @var string
     */
    private $methodName;

    /**
     * 参数对象
     *
     * @var ArgsInjection[]
     */
    private $parameters = [];

    public function __construct(string $methodName, array $parameters)
    {
        $this->methodName = $methodName;
        $this->parameters = $parameters;
    }

    /**
     * 获取方法名称
     */
    public function getMethodName(): string
    {
        return $this->methodName;
    }

    /**
     * 获取参数对象列表
     *
     * @return ArgsInjection[]
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }
}
