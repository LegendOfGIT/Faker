<?php

namespace Faker;

use Faker\Exception\InterfaceNotImplementedException;
use Faker\Provider\PersonProvider;
use Faker\Spies\PersonProviderSpy;
use Faker\Stubs\ProviderStub;
use Faker\Stubs\TestStub;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

/**
 * Tests of faker
 */
class FakerTest extends TestCase
{
    /**
     * @var Faker
     */
    private $faker;

    /**
     * @var PersonProviderSpy
     */
    private $personProviderSpy;

    public function setUp()
    {
        $this->faker = new Faker([
            'firstNameFemale' => PersonProvider::class,
            'firstNameMale' => PersonProvider::class,
            'lastName' => PersonProvider::class,
            'fooBar' => PersonProvider::class,
        ]);
        $this->personProviderSpy = new PersonProviderSpy();
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

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Unknown formatter "foobar"
     */
    public function testFakerThrowsExceptionWhenGetIsCalledWithUnknownFormatter()
    {
        $this->faker->foobar;
    }

    /**
     * @throws InterfaceNotImplementedException
     */
    public function testFakerReturnsValueWhenGetIsCalledWithKnownFormatter()
    {
        $this->faker->addProvider($this->personProviderSpy);
        $this->assertSame(PersonProviderSpy::FIRST_NAME_FEMALE, $this->faker->firstNameFemale);
        $this->assertSame(PersonProviderSpy::FIRST_NAME_MALE, $this->faker->firstNameMale);
        $this->assertSame(PersonProviderSpy::FIRST_NAME_MALE, $this->faker->firstName);
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage No provider for formatter "fooBar"
     */
    public function testFakerThrowsExceptionWhenNoProviderFoundForFormatter()
    {
        $this->faker->fooBar;
    }

    /**
     * @dataProvider getPersonProviderFormatterProvider
     * @param string $formatterName
     * @throws InterfaceNotImplementedException
     */
    public function testFakerCallsPersonProviderOnlyForRelatedFormatters($formatterName)
    {
        $this->faker->addProvider($this->personProviderSpy);
        $this->faker->$formatterName;

        $this->assertContains($formatterName, $this->personProviderSpy->getCalledFormatters());
    }

    /**
     * @return array
     */
    public function getPersonProviderFormatterProvider()
    {
        return [
            ['firstNameFemale'],
            ['firstNameMale'],
            ['lastName'],
        ];
    }

}
