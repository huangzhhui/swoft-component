<?php

namespace Swoft\Bean\Annotation;

/**
 * Bean scope constants
 */
final class Scope
{
    /**
     * Always return the SAME object when
     * get the bean from container.
     */
    const SINGLETON = 1;

    /**
     * Always return an NEW object when
     * get the bean from container.
     */
    const PROTOTYPE = 2;
}
