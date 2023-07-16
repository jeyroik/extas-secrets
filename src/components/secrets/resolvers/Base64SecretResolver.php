<?php
namespace extas\components\secrets\resolvers;

use extas\components\Item;
use extas\interfaces\secrets\ISecret;
use extas\components\secrets\ESecretFlag;
use extas\interfaces\secrets\ISecretResolver;

class Base64SecretResolver extends Item implements ISecretResolver
{
    public function __invoke(ISecret &$secret, ESecretFlag $flag): bool
    {
        return $flag->isEncrypt() ? $this->encrypt($secret) : $this->decrypt($secret);
    }

    protected function encrypt(ISecret &$secret): bool
    {
        $secret->setValue(base64_encode($secret->getValue()));

        return true;
    }

    protected function decrypt(ISecret &$secret): bool
    {
        $secret->setValue(base64_decode($secret->getValue()));

        return true;
    }

    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT . '.base64';
    }
}
