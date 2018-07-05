<?php

namespace Faker;

use Faker\Exception\InterfaceNotImplementedException;
use Faker\Provider\PersonProvider;
use Faker\Spies\PersonProviderSpy;
use Faker\Spies\RandomizerSpy;
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

    /**
     * @var RandomizerSpy
     */
    private $randomizerSpy;

    public function setUp()
    {
        $this->personProviderSpy = new PersonProviderSpy();
        $this->randomizerSpy = new RandomizerSpy();

        $this->faker = new Faker(
            $this->randomizerSpy,
            [
                'academicTitleFemale' => [PersonProvider::class, 'academicTitlesFemale'],
                'academicTitleMale' => [PersonProvider::class, 'academicTitlesMale'],
                'firstNameFemale' => [PersonProvider::class, 'firstNamesFemale'],
                'firstNameMale' => [PersonProvider::class, 'firstNamesMale'],
                'lastName' => [PersonProvider::class, 'lastNames'],
                'salutationFemale' => [PersonProvider::class, 'salutationsFemale'],
                'salutationMale' => [PersonProvider::class, 'salutationsMale'],
                'fooBar' => [PersonProvider::class, 'foosbar'],
            ]
        );
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
        $this->assertSame(PersonProviderSpy::FIRST_NAME_MALE_A, $this->faker->firstNameMale);
    }

    /**
     * @throws InterfaceNotImplementedException
     */
    public function testFakerReturnsDefaultGenderValueWhenGetIsCalledWithAmbiguousKnownFormatter()
    {
        $this->faker->addProvider($this->personProviderSpy);
        $this->assertSame(PersonProviderSpy::ACADEMIC_TITLE_MALE, $this->faker->academicTitle);
        $this->assertSame(PersonProviderSpy::FIRST_NAME_MALE_A, $this->faker->firstName);
        $this->assertSame(PersonProviderSpy::SALUTATION_MALE, $this->faker->salutation);
    }

    /**
     * @throws InterfaceNotImplementedException
     */
    public function testFakerCallsRandomizerToReturnARandomizedElementFromProvider()
    {
        $this->faker->addProvider($this->personProviderSpy);

        $this->faker->firstName;

        $this->assertSame(
            [
                'function' => 'getRandomizedElement',
                'elements' => [PersonProviderSpy::FIRST_NAME_MALE_A, PersonProviderSpy::FIRST_NAME_MALE_B]
            ],
            $this->randomizerSpy->getCalls()[0]
        );
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
     * @param string $calledFormatter
     * @throws InterfaceNotImplementedException
     */
    public function testFakerCallsPersonProviderOnlyForRelatedFormatters($formatterName, $calledFormatter)
    {
        $this->faker->addProvider($this->personProviderSpy);
        $this->faker->$formatterName;

        $this->assertContains($calledFormatter, $this->personProviderSpy->getCalledFormatters());
    }

    /**
     * @return array
     */
    public function getPersonProviderFormatterProvider()
    {
        return [
            ['academicTitleFemale', 'academicTitlesFemale'],
            ['academicTitleMale', 'academicTitlesMale'],
            ['firstNameFemale', 'firstNamesFemale'],
            ['firstNameMale', 'firstNamesMale'],
            ['lastName', 'lastNames'],
            ['salutationFemale', 'salutationsFemale'],
            ['salutationMale', 'salutationsMale'],
        ];
    }
}
