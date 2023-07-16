<?php
namespace tests\secrets;

use extas\components\secrets\resolvers\Base64SecretResolver;
use extas\components\secrets\Secret;
use extas\interfaces\extensions\secrets\IExtensionSecretWithKey;
use extas\interfaces\extensions\secrets\IExtensionSecretWithPassword;
use extas\interfaces\secrets\ISecret;
use tests\ExtasTestCase;

/**
 * Class SecretTest
 *
 * @package tests\secrets
 * @author jeyroik <jeyroik@gmail.com>
 */
class SecretTest extends ExtasTestCase
{
    protected array $libsToInstall = [
        '' => ['php', 'php']
        //'vendor/lib' => ['php', 'json'] storage ext, extas ext
    ];
    protected bool $isNeedInstallLibsItems = true;
    protected string $testPath = __DIR__;

    public function testResolve()
    {
        $secret = new Secret([
            Secret::FIELD__CLASS => Base64SecretResolver::class,
            Secret::FIELD__VALUE => 'test'
        ]);

        $encrypted = $secret->encrypt();

        $this->assertTrue($encrypted, 'Incorrect encrypting');
        $this->assertEquals(
            base64_encode('test'),
            $secret->getValue(),
            'Incorrect value: ' . print_r($secret->getValue(), true)
        );

        $decrypted = $secret->decrypt();
        $this->assertTrue($decrypted, 'Incorrect decrypting');
        $this->assertEquals(
            'test',
            $secret->getValue(),
            'Incorrect value: ' . print_r($secret->getValue(), true)
        );
    }

    public function testSecretWithPassword()
    {
        /**
         * @var IExtensionSecretWithPassword|ISecret $secret
         */
        $secret = new Secret();
        $secret->withPassword('test');

        $this->assertEquals('test', $secret->getPassword());
    }

    public function testSecretWithKey()
    {
        /**
         * @var IExtensionSecretWithKey|ISecret $secret
         */
        $secret = new Secret();
        $secret->withKey('test');

        $this->assertEquals('test', $secret->getKey());
    }
}
