<?php

namespace Swoft\Bean\Annotation;

/**
 * @Annotation
 * @Target("CLASS")
 */
class Bean
{
    /**
     * @var string
     */
    private $name = '';

    /**
     * @var int
     */
    private $scope = Scope::SINGLETON;

    /**
     * referenced bean, default is null
     *
     * @var string
     */
    private $ref = '';

    public function __construct(array $values)
    {
        if (isset($values['value'])) {
            $this->name = $values['value'];
        }
        if (isset($values['name'])) {
            $this->name = $values['name'];
        }
        if (isset($values['scope'])) {
            $this->scope = $values['scope'];
        }
        if (isset($values['ref'])) {
            $this->ref = $values['ref'];
        }
    }

    /**
     * Get the bean name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the bean scope
     *
     * @return int
     */
    public function getScope(): int
    {
        return $this->scope;
    }

    /**
     * Get the name of referenced bean
     *
     * @return string
     */
    public function getRef(): string
    {
        return $this->ref;
    }
}
