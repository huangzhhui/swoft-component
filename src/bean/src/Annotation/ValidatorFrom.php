<?php

namespace Swoft\Bean\Annotation;

/**
 * Validator param types constants
 */
class ValidatorFrom
{
    /**
     * The params from get
     */
    const GET = 'get';

    /**
     * The params from post
     */
    const POST = 'post';

    /**
     * The params from path
     */
    const PATH = 'path';

    /**
     * The params from get/post/path
     */
    const QUERY = 'query';

    /**
     * The params from property of entity
     */
    const PROPERTY = 'property';

    /**
     * The params from swoft rpc
     */
    const SERVICE = 'service';
}
