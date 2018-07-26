<?php

namespace Swoft\Redis\Aspect;

use Swoft\Aop\JoinPoint;
use Swoft\Bean\Annotation\AfterReturning;
use Swoft\Bean\Annotation\Aspect;
use Swoft\Bean\Annotation\Before;
use Swoft\Bean\Annotation\PointBean;
use Swoft\Log\Log;

/**
 * @Aspect()
 * @PointBean({
 *     RedisCache::class
 * })
 */
class RedisAspect
{

    const PROFILE_PREFIX = 'redis';

    /**
     * @Before()
     * @param JoinPoint $joinPoint
     */
    public function before(JoinPoint $joinPoint)
    {
        $profileKey = $this->getProfileKey($joinPoint);
        Log::profileStart($profileKey);
    }

    /**
     * @AfterReturning()
     * @param JoinPoint $joinPoint
     *
     * @return mixed
     */
    public function afterReturning(JoinPoint $joinPoint)
    {
        $profileKey = $this->getProfileKey($joinPoint);
        Log::profileEnd($profileKey);

        return $joinPoint->getReturn();
    }

    /**
     * @param JoinPoint $joinPoint
     *
     * @return string
     */
    private function getProfileKey(JoinPoint $joinPoint)
    {
        $method = $joinPoint->getMethod();
        if ($method == '__call') {
            list($method) = $joinPoint->getArgs();
        }

        return self::PROFILE_PREFIX . '.' . $method;
    }
}
