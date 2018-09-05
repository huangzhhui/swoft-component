<?php

namespace Swoft\Bean\Annotation;

/**
 * Use this annotation to inject a value.
 * 1. The value from config.
 * 2. The value from env value.
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class Value
{
    /**
     * Property name
     */
    private $name = '';

    /**
     * Env name
     */
    private $env = '';

    public function __construct(array $values)
    {
        if (isset($values['value'])) {
            $this->name = $values['value'];
        }
        if (isset($values['name'])) {
            $this->name = $values['name'];
        }
        if (isset($values['env'])) {
            $this->env = $values['env'];
        }
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEnv(): string
    {
        return $this->env;
    }
}
