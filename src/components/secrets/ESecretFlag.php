<?php
namespace extas\components\secrets;

enum ESecretFlag: string
{
    case Encrypt = 'enc';
    case Decrypt = 'dec';

    public function isEncrypt(): bool
    {
        return $this->value == ESecretFlag::Encrypt->value;
    }
}
