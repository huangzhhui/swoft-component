<?php

namespace Swoft\Bean\Annotation;

/**
 * 枚举类型注解
 *
 * @Annotation
 * @Target("METHOD")
 */
class Enum
{

    private $from = ValidatorFrom::POST;

    /**
     * 字段名称
     */
    private $name = '';

    /**
     * 枚举值集合
     */
    private $values = [];

    /**
     * 错误文案
     */
    private $template = '';

    /**
     * 默认值
     *
     * @var mixed
     */
    private $default = null;

    public function __construct(array $values)
    {
        if (isset($values['from'])) {
            $this->from = $values['from'];
        }
        if (isset($values['name'])) {
            $this->name = $values['name'];
        }
        if (isset($values['values'])) {
            $this->values = $values['values'];
        }
        if (isset($values['default'])) {
            $this->default = $values['default'];
        }
        if (isset($values['template'])) {
            $this->template = $values['template'];
        }
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getValues(): array
    {
        return $this->values;
    }

    /**
     * @return mixed
     */
    public function getDefault()
    {
        return $this->default;
    }

    public function getFrom(): string
    {
        return $this->from;
    }

    public function getTemplate(): string
    {
        return $this->template;
    }

    public function setTemplate(string $template)
    {
        $this->template = $template;
    }
}
