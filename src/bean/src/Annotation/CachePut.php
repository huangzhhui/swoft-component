<?php

namespace Swoft\Bean\Annotation;

/**
 * @Annotation
 * @Target("METHOD")
 */
class CachePut
{

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $key;

    /**
     * @var int;
     */
    private $ttl;

    /**
     * @var string
     */
    private $condition;

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
        if (isset($values['ttl'])) {
            $this->ttl = $values['ttl'];
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

    public function getTtl(): int
    {
        return $this->ttl;
    }

    public function getCondition(): string
    {
        return $this->condition;
    }
}
