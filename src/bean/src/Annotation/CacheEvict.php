<?php

namespace Swoft\Bean\Annotation;

/**
 * @Annotation
 * @Target("METHOD")
 */
class CacheEvict
{

    private $name = '';

    private $key = '';

    private $condition = '';

    private $all = false;

    public function __construct(array $values)
    {
        if (isset($values['value'])) {
            $this->name = $values['value'];
        }
        if (isset($values['name'])) {
            $this->name = $values['name'];
        }
        if (isset($values['key'])) {
            $this->key = $values['key'];
        }
        if (isset($values['all'])) {
            $this->all = $values['all'];
        }
        if (isset($values['condition'])) {
            $this->condition = $values['condition'];
        }
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function getCondition(): string
    {
        return $this->condition;
    }

    public function isAll(): bool
    {
        return $this->all;
    }
}
