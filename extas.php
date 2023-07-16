<?php

use extas\components\extensions\secrets\ExtensionSecretWithKey;
use extas\components\extensions\secrets\ExtensionSecretWithPassword;
use extas\interfaces\extensions\IExtension;
use extas\interfaces\extensions\secrets\IExtensionSecretWithKey;
use extas\interfaces\extensions\secrets\IExtensionSecretWithPassword;
use extas\interfaces\secrets\ISecret;

return [
    'name' => 'jeyroik/extas-secrets',
    'extensions' => [
        [
            IExtension::FIELD__CLASS => ExtensionSecretWithPassword::class,
            IExtension::FIELD__SUBJECT => ISecret::SUBJECT,
            IExtension::FIELD__INTERFACE => IExtensionSecretWithPassword::class,
            IExtension::FIELD__METHODS => [
                IExtensionSecretWithPassword::METHOD__WITH_PASSWORD,
                IExtensionSecretWithPassword::METHOD__GET_PASSWORD
            ]
        ],
        [
            IExtension::FIELD__CLASS => ExtensionSecretWithKey::class,
            IExtension::FIELD__SUBJECT => ISecret::SUBJECT,
            IExtension::FIELD__INTERFACE => IExtensionSecretWithKey::class,
            IExtension::FIELD__METHODS => [
                IExtensionSecretWithKey::METHOD__WITH_KEY,
                IExtensionSecretWithKey::METHOD__GET_KEY
            ]
        ]
    ]
];
