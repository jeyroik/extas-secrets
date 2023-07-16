<?php
namespace extas\components\extensions\secrets;

use extas\components\extensions\Extension;
use extas\components\parameters\Param;
use extas\interfaces\extensions\secrets\IExtensionSecretWithPassword;
use extas\interfaces\secrets\ISecret;

class ExtensionSecretWithPassword extends Extension implements IExtensionSecretWithPassword
{
    public function withPassword(string $password, ISecret $secret = null): ISecret
    {
        $secret->addParam(new Param([
            Param::FIELD__NAME => static::PARAM__PASSWORD,
            Param::FIELD__VALUE => $password
        ]));

        return $secret;
    }

    public function getPassword(ISecret $secret = null): string
    {
        return $secret->buildParams()->hasOne(static::PARAM__PASSWORD) 
                ? $secret->buildParams()->buildOne(static::PARAM__PASSWORD)->getValue() 
                : '';
    }
}
