<?php
namespace extas\interfaces\extensions\secrets;

use extas\interfaces\secrets\ISecret;

interface IExtensionSecretWithPassword
{
    public const PARAM__PASSWORD = 'password';

    public const METHOD__WITH_PASSWORD = 'withPassword';
    public const METHOD__GET_PASSWORD = 'getPassword';

    public function withPassword(string $password): ISecret;
    public function getPassword(): string;
}
