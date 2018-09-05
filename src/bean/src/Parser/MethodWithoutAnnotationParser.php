<?php

namespace Swoft\Bean\Parser;

use Swoft\Helper\ComponentHelper;
use function class_exists;
use function dirname;
use function is_dir;
use function pathinfo;
use function scandir;

/**
 * 方法没有注解解析器
 */
class MethodWithoutAnnotationParser extends AbstractParser
{
    /**
     * 方法没有注解解析
     */
    public function parser(
        string $className,
        $objectAnnotation = null,
        string $propertyName = '',
        string $methodName = '',
        $propertyValue = null
    ): null {
        $swoftDir = dirname(__FILE__, 5);
        $componentDirs = scandir($swoftDir, null);
        foreach ($componentDirs as $component) {
            if ($component == '.' || $component == '..') {
                continue;
            }

            $componentCommandDir = $swoftDir . DS . $component . DS . 'src/Bean/Collector';
            if (! is_dir($componentCommandDir)) {
                continue;
            }

            $componentNs = ComponentHelper::getComponentNs($component);
            $collectNs = "Swoft{$componentNs}\\Bean\\Collector";
            $collectorFiles = scandir($componentCommandDir, null);
            foreach ($collectorFiles as $collectorFile) {
                $pathInfo = pathinfo($collectorFile);
                if (! isset($pathInfo['filename'])) {
                    continue;
                }
                $fileName = $pathInfo['filename'];
                $collectClassName = $collectNs . '\\' . $fileName;
                if (! class_exists($collectClassName)) {
                    continue;
                }

                /* @var \Swoft\Bean\CollectorInterface $collector */
                $collector = new $collectClassName();
                $collector->collect($className, $objectAnnotation, $propertyName, $methodName, $propertyValue);
            }
        }

        return null;
    }
}
