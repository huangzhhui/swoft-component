<?php

namespace Swoft\Bean\Annotation;

/**
 * Use this annotation to listen an event
 *
 * @Annotation
 * @Target("CLASS")
 */
class Listener
{
    /**
     * The event name that you want to listen.
     */
    private $event = '';

    public function __construct(array $values)
    {
        if (isset($values['value'])) {
            $this->event = $values['value'];
        }

        if (isset($values['event'])) {
            $this->event = $values['event'];
        }
    }

    public function getEvent(): string
    {
        return $this->event;
    }
}
