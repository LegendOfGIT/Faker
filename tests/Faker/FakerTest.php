<?php

namespace Faker;

use Faker\Exception\InterfaceNotImplementedException;
use Faker\Stubs\ProviderStub;
use Faker\Stubs\TestStub;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

/**
 * Tests of faker
 */
class FakerTest extends TestCase
{
    const GLOBALS_CALL_USER_FUNC_CALL_HISTORY = 'callUserFuncCallHistory';
    const GLOBALS_METHOD_EXISTS_CALL_HISTORY = 'methodExistsCallHistory';

    public function tearDown()
    {
        unset($GLOBALS[static::GLOBALS_CALL_USER_FUNC_CALL_HISTORY]);
        unset($GLOBALS[static::GLOBALS_METHOD_EXISTS_CALL_HISTORY]);
    }

    /**
     * @var Faker
     */
    private $faker;

    public function setUp()
    {
        $this->faker = new Faker();
    }

    /**
     * @expectedException \Faker\Exception\InterfaceNotImplementedException
     */
    public function testFakerThrowsExceptionWhenProviderWithoutProviderInterfaceIsAdded()
    {
        $this->faker->addProvider(new TestStub());
    }

    /**
     * @throws InterfaceNotImplementedException
     */
    public function testFakerAddsAProviderImplementingProviderInterface()
    {
        $provider = new ProviderStub();
        $this->faker->addProvider($provider);
        $this->assertSame([$provider], $this->faker->getProviders());
    }

    public function testFakerCallsMethodExistsToFindMatchingFormatter()
    {
        $this->faker->firstName;
        $this->assertSame(
            [
                [
                    'object' => $this->faker,
                    'method_name' => 'firstName'
                ]
            ],
            $GLOBALS[static::GLOBALS_METHOD_EXISTS_CALL_HISTORY]
        );
    }

    public function testFakerCallsCallUserFuncWhenMatchingFormatterWasFound()
    {
        $this->faker->firstName;
        $this->assertSame(
            [
                [
                    'function' => [$this->faker, 'firstName'],
                    'parameter' => []
                ]
            ],
            $GLOBALS[static::GLOBALS_CALL_USER_FUNC_CALL_HISTORY]
        );
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Unknown formatter "foobar"
     */
    public function testFakerThrowsExceptionWhenGetIsCalledWithUnknownFormatter()
    {
        $this->faker->foobar;
    }

    public function testFakerReturnsValueWhenGetIsCalledWithKnownFormatter()
    {
        $this->assertSame('adam', $this->faker->firstName);
    }
}

/**
 * @param mixed $object
 * @param string $method_name
 * @return bool
 */
function method_exists($object, $method_name)
{
    $validTestingMethods = ['firstName'];

    global $methodExistsCallHistory;
    $methodExistsCallHistory[] = [
        'object' => $object,
        'method_name' => $method_name
    ];

    return in_array($method_name, $validTestingMethods);
}

/**
 * @param callback $function
 * @param mixed ...$parameter
 * @return mixed|null
 */
function call_user_func($function, ...$parameter)
{
    global $callUserFuncCallHistory;
    $callUserFuncCallHistory[] = [
        'function' => $function,
        'parameter' => $parameter
    ];

    $testValueMapping = [
        'firstName' => 'adam'
    ];

    $functionName = $function[1];

    if (array_key_exists($functionName, $testValueMapping)) {
        return $testValueMapping[$functionName];
    }

    return null;
}
