<?php

namespace Swoft\Sg\Event\Listeners;

use Swoft\Bootstrap\Listeners\Interfaces\BeforeStartInterface;
use Swoft\Bootstrap\Server\AbstractServer;
use Swoft\Core\ApplicationContext;
use Swoole\Lock;
use Swoft\Bean\Annotation\BeforeStart;

/**
 * Brfore start listener
 *
 * @BeforeStart();
 */
class BeforeStartListener implements BeforeStartInterface
{

    public function onBeforeStart(AbstractServer $server)
    {
        if (env('AUTO_REGISTER', false)) {
            ApplicationContext::set('sg.register.lock', new Lock(SWOOLE_RWLOCK));
        }
    }
}