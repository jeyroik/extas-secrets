<?php
namespace tests\secrets\misc;

use extas\components\Item;
use extas\interfaces\secrets\ISecret;
use extas\interfaces\secrets\ISecretResolver;

/**
 * Class ExampleResolver
 *
 * @package tests\secrets\misc
 * @author jeyroik <jeyroik@gmail.com>
 */
class ExampleResolver extends Item implements ISecretResolver
{
    public const FIELD__RETURN = 'return';

    /**
     * @param ISecret $secret
     * @return bool
     * @throws \Exception
     */
    public function __invoke(ISecret &$secret, string $flag): bool
    {
        return $flag === ISecret::FLAG__ENCRYPT
            ? $this->encrypt($secret)
            : $this->decrypt($secret);
    }

    protected function encrypt(ISecret &$secret): bool
    {
        $secret->setValue(base64_encode($secret->getValue()));

        $return = $this->config[static::FIELD__RETURN] ?? true;

        if (!$return) {
            throw new \Exception('Error');
        }

        return true;
    }

    protected function decrypt(ISecret &$secret): bool
    {
        $secret->setValue(base64_decode($secret->getValue()));

        $return = $this->config[static::FIELD__RETURN] ?? true;

        if (!$return) {
            throw new \Exception('Error');
        }

        return true;
    }

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return 'extas.secret.resolver.example';
    }
}
