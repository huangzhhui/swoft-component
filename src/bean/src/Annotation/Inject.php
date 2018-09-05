<?php

namespace Swoft\Bean\Annotation;

/**
 * Use this annotation to inject a bean.
 *
 * @Annotation
 * @Target({"PROPERTY","METHOD"})
 */
class Inject
{

    /**
     * The bean name that injected
     */
    private $name = '';

    public function __construct(array $values)
    {
        if (isset($values['value'])) {
            $this->name = $values['value'];
        }
        if (isset($values['name'])) {
            $this->name = $values['name'];
        }
    }

    public function getName(): string
    {
        return $this->name;
    }
}
