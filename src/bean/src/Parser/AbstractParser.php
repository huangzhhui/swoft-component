<?php

namespace Swoft\Bean\Parser;

use Swoft\Bean\Resource\AnnotationResource;

abstract class AbstractParser implements ParserInterface
{
    /**
     * 注解解析资源
     *
     * @var AnnotationResource
     */
    protected $annotationResource;

    public function __construct(AnnotationResource $annotationResource)
    {
        $this->annotationResource = $annotationResource;
    }
}
