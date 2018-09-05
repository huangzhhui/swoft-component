<?php

namespace Swoft\Bean\Parser;

use Swoft\Helper\DocumentHelper;

class ValueParser extends AbstractParser
{

    public function parser(
        string $className,
        $objectAnnotation = null,
        string $propertyName = '',
        string $methodName = '',
        $propertyValue = null
    ): array {
        $injectValue = $objectAnnotation->getName();
        $envValue = $objectAnnotation->getEnv();
        if (empty($injectValue) && empty($envValue)) {
            throw new \InvalidArgumentException("The value of @Value annotation cannot be empty! class={$className} property={$propertyName}");
        }

        $isRef = false;
        $injectProperty = null;
        if (! empty($injectValue)) {
            list($injectProperty, $isRef) = $this->annotationResource->getTransferProperty($injectValue);
        }

        if (! empty($envValue)) {
            $value = $this->getEnvValue($envValue);
            $isArray = $this->isEnvArrayValue($className, $propertyName);
            $value = $this->transferEnvValue($value, $isArray);
            $injectProperty = $value ?? $injectProperty;
            $isRef = ($value !== null) ? false : $isRef;
        }

        return [$injectProperty, $isRef];
    }

    /**
     * Transfer the value of env
     *
     * @param mixed $value
     * @param bool $isArray
     * @return mixed
     */
    private function transferEnvValue($value, bool $isArray)
    {
        if ($value === null) {
            return null;
        }

        if ($isArray === false) {
            return $value;
        }

        if (empty($value)) {
            $value = [];
        } else {
            $value = explode(',', $value);
        }

        return $value;
    }

    /**
     * Whether the value of env is array
     */
    private function isEnvArrayValue(string $className, string $propertyName): bool
    {
        $rc = new \ReflectionClass($className);
        $rp = $rc->getProperty($propertyName);
        $doc = $rp->getDocComment();
        $tags = DocumentHelper::tagList($doc);
        if (isset($tags['var']) && $tags['var'] == 'array') {
            return true;
        }

        return false;
    }

    /**
     * Match env value
     *
     * @return mixed|string
     */
    private function getEnvValue(string $envValue)
    {
        $value = $envValue;
        if (preg_match('/^\$\{(.*)\}$/', $envValue, $match)) {
            $value = env($match[1]);
        }

        return $value;
    }
}
