<?php

namespace Swoft\Core;

use Swoft\App;
use Swoft\Bean\Collector\ListenerCollector;
use Swoft\Event\AppEvent;
use Swoole\Lock;

/**
 * Class InitApplicationContext
 *
 * @package Swoft\Core
 */
class InitApplicationContext
{

    public function init()
    {
        $this->registerListeners();
        $this->applicationLoader();
    }

    private function registerListeners()
    {
        ApplicationContext::registerListeners(ListenerCollector::getCollector());
    }

    /**
     * Init Event
     */
    private function applicationLoader()
    {
        // Init application loader event
        App::trigger(AppEvent::APPLICATION_LOADER, null);
    }

}
