<?php

namespace Swoft\Bean\Annotation;

/**
 * 整数或负整数验证器
 *
 * @Annotation
 * @Target("METHOD")
 */
class Integer
{

    private $from = ValidatorFrom::POST;

    /**
     * 字段名称
     *
     * @var string
     */
    private $name;

    /**
     * 最小值
     *
     * @var int
     */
    private $min = PHP_INT_MIN;

    /**
     * 最小值
     *
     * @var int
     */
    private $max = PHP_INT_MAX;

    /**
     * 错误文案
     */
    private $template = '';

    /**
     * 默认值，如果是null，强制验证参数
     *
     * @var null|integer
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
        if (isset($values['min'])) {
            $this->min = $values['min'];
        }
        if (isset($values['max'])) {
            $this->max = $values['max'];
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

    public function getMin(): int
    {
        return $this->min;
    }

    public function getMax(): int
    {
        return $this->max;
    }

    /**
     * @return int|null
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

    public function setTemplate(string $template): self
    {
        $this->template = $template;
        return $this;
    }
}
