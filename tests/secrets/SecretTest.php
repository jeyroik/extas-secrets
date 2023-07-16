<?php
namespace tests\secrets;

use extas\components\secrets\resolvers\Base64SecretResolver;
use extas\components\secrets\Secret;
use extas\interfaces\parameters\IParam;
use tests\ExtasTestCase;
use tests\resources\ExampleResolver;

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
    protected bool $isNeedInstallLibsItems = false;
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
}
