<?php

namespace Swoft\Bean\Annotation;

/**
 * @Annotation
 * @Target("METHOD")
 */
class Strings
{

    private $from = ValidatorFrom::POST;

    /**
     * Parameter name
     *
     * @var string
     */
    private $name;

    /**
     * Min value
     *
     * @var int
     */
    private $min = PHP_INT_MIN;

    /**
     * Max value
     *
     * @var int
     */
    private $max = PHP_INT_MAX;

    /**
     * @var string
     */
    private $template = '';

    /**
     * 默认值，如果是null，强制验证参数
     *
     * @var null|string
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

    public function getFrom(): string
    {
        return $this->from;
    }

    public function setFrom(string $from): Strings
    {
        $this->from = $from;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Strings
    {
        $this->name = $name;

        return $this;
    }

    public function getMin(): int
    {
        return $this->min;
    }

    public function setMin(int $min): Strings
    {
        $this->min = $min;

        return $this;
    }

    public function getMax(): int
    {
        return $this->max;
    }

    public function setMax(int $max): Strings
    {
        $this->max = $max;

        return $this;
    }

    public function getDefault()
    {
        return $this->default;
    }

    public function setDefault($default): Strings
    {
        $this->default = $default;

        return $this;
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
