<?php
namespace extas\interfaces\extensions\secrets;

use extas\interfaces\secrets\ISecret;

interface IExtensionSecretWithKey
{
    public const PARAM__KEY = 'key';

    public const METHOD__WITH_KEY = 'withKey';
    public const METHOD__GET_KEY = 'getKey';

    public function withKey(string $key): ISecret;
    public function getKey(): string;
}
