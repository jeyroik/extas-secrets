<?php
namespace extas\components\secrets;

use extas\components\exceptions\MissedOrUnknown;
use extas\components\Item;
use extas\components\parameters\THasParams;
use extas\components\TDispatcherWrapper;
use extas\components\THasStringId;
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
    use THasValue;
    use THasStringId;
    use THasParams;

    /**
     * @return bool
     * @throws MissedOrUnknown
     */
    public function encrypt(): bool
    {
        return $this->resolve(ESecretFlag::Encrypt);
    }

    /**
     * @return bool
     * @throws MissedOrUnknown
     */
    public function decrypt(): bool
    {
        return $this->resolve(ESecretFlag::Decrypt);
    }

    protected function resolve(ESecretFlag $flag): bool
    {
        /**
         * @var ISecretResolver $resolver
         */
        $resolver = $this->buildClassWithParameters($this->getParamsValues());

        try {
            return $resolver($this, $flag);
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
