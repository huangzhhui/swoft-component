<?php

namespace Swoft\Bean;

/**
 * Bean factory interface
 */
interface BeanFactoryInterface
{
    /**
     * Get bean
     *
     * @return mixed
     */
    public static function getBean(string $name);

    public static function hasBean(string $name): bool;
}
