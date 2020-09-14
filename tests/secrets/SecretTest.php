<?php
namespace tests\secrets;

use Dotenv\Dotenv;
use extas\components\secrets\Secret;
use extas\interfaces\samples\parameters\ISampleParameter;
use PHPUnit\Framework\TestCase;
use tests\secrets\misc\ExampleResolver;

/**
 * Class SecretTest
 *
 * @package tests\secrets
 * @author jeyroik <jeyroik@gmail.com>
 */
class SecretTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $env = Dotenv::create(getcwd() . '/tests/');
        $env->load();
    }

    public function testResolve()
    {
        $secret = new Secret([
            Secret::FIELD__CLASS => ExampleResolver::class,
            Secret::FIELD__PARAMETERS => [
                ExampleResolver::FIELD__RETURN => [
                    ISampleParameter::FIELD__NAME => ExampleResolver::FIELD__RETURN,
                    ISampleParameter::FIELD__VALUE => true
                ]
            ]
        ]);

        $resolved = $secret->resolve();

        $this->assertTrue($resolved, 'Incorrect resolving');
        $this->assertEquals(
            'resolved',
            $secret->getValue(),
            'Incorrect value: ' . print_r($secret->getValue(), true)
        );

        $secret->setParameterValue(ExampleResolver::FIELD__RETURN, false);

        $resolved = $secret->resolve();
        $this->assertFalse($resolved, 'Incorrect resolving');

        $secret->setTarget('test');
        $this->assertEquals('test', $secret->getTarget(), 'Incorrect target');
    }
}
