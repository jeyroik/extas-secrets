<?php
namespace extas\components\secrets;

use extas\components\exceptions\MissedOrUnknown;
use extas\components\Item;
use extas\components\samples\parameters\THasSampleParameters;
use extas\components\TDispatcherWrapper;
use extas\components\THasValue;
use extas\interfaces\secrets\ISecret;
use extas\interfaces\secrets\ISecretResolver;

/**
 * Class Secret
 *
 * @package extas\components\secrets
 * @author jeyroik <jeyroik@gmail.com>
 */
class Secret extends Item implements ISecret
{
    use TDispatcherWrapper;
    use THasSampleParameters;
    use THasValue;

    /**
     * @return bool
     * @throws MissedOrUnknown
     */
    public function resolve(): bool
    {
        /**
         * @var ISecretResolver $resolver
         */
        $resolver = $this->buildClassWithParameters($this->getParametersValues());

        try {
            return $resolver($this);
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * @return string
     */
    public function getTarget(): string
    {
        return $this->config[static::FIELD__TARGET] ?? '';
    }

    /**
     * @param string $target
     * @return $this|Secret
     */
    public function setTarget(string $target)
    {
        $this->config[static::FIELD__TARGET] = $target;

        return $this;
    }

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
