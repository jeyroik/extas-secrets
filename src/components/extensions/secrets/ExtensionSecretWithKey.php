<?php
namespace extas\components\extensions\secrets;

use extas\components\extensions\Extension;
use extas\components\parameters\Param;
use extas\interfaces\extensions\secrets\IExtensionSecretWithKey;
use extas\interfaces\secrets\ISecret;

class ExtensionSecretWithKey extends Extension implements IExtensionSecretWithKey
{
    public function withKey(string $key, ISecret $secret = null): ISecret
    {
        $secret->addParam(new Param([
            Param::FIELD__NAME => static::PARAM__KEY,
            Param::FIELD__VALUE => $key
        ]));

        return $secret;
    }

    public function getKey(ISecret $secret = null): string
    {
        return $secret->buildParams()->hasOne(static::PARAM__KEY) 
                ? $secret->buildParams()->buildOne(static::PARAM__KEY)->getValue() 
                : '';
    }
}
