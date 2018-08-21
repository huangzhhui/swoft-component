<?php

namespace Swoft\Sg\Event\Listeners;

use Swoft\App;
use Swoft\Bean\Annotation\Listener;
use Swoft\Core\ApplicationContext;
use Swoft\Event\EventHandlerInterface;
use Swoft\Event\EventInterface;
use Swoft\Event\AppEvent;
use Swoole\Lock;

/**
 * Worker start listener
 *
 * @Listener(AppEvent::WORKER_START)
 */
class WorkerStartListener implements EventHandlerInterface
{
    /**
     * @param \Swoft\Event\EventInterface $event
     */
    public function handle(EventInterface $event)
    {
        if (env('AUTO_REGISTER', false) && App::hasBean('providerSelector')) {
            $lock = ApplicationContext::get('sg.register.lock');
            if ($lock instanceof Lock && $lock->trylock()) {
                /** @var \Swoft\Sg\ProviderSelector $provider */
                $provider = App::getBean('providerSelector');
                $provider->select()->registerService();
            }
        }
    }
}