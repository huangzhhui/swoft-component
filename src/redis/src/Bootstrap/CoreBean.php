<?php

namespace Swoft\Redis\Bootstrap;

use Swoft\Bean\Annotation\BootBean;
use Swoft\Core\BootBeanInterface;

/**
 * @BootBean()
 */
class CoreBean implements BootBeanInterface
{
    public function beans()
    {
        return [];
    }
}