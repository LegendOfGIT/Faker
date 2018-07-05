<?php

namespace Faker\Integration;

use Faker\Exception\InterfaceNotImplementedException;
use Faker\Faker;
use Faker\Provider\ar_JO\Person;
use Faker\Spies\RandomizerSpy;
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

    public function setUp()
    {
        $this->faker = new Faker(new RandomizerSpy());
    }

    /**
     * @throws InterfaceNotImplementedException
     */
    public function testProvidersCanBeAdded()
    {
        $this->faker->addProvider(new Person());
        $this->assertTrue(true);
    }

    /**
     * @throws InterfaceNotImplementedException
     */
    public function testFakerReturnsValuesForPersonFormatters()
    {
        $this->faker->addProvider(new Person());
        $this->assertSame('المهندس', $this->faker->academicTitle);
        $this->assertSame('الدكتورة', $this->faker->academicTitleFemale);
        $this->assertSame('المهندس', $this->faker->academicTitleMale);
        $this->assertSame('آدم', $this->faker->firstName);
        $this->assertSame('آثار', $this->faker->firstNameFemale);
        $this->assertSame('آدم', $this->faker->firstNameMale);
        $this->assertSame('آلهامي', $this->faker->lastName);
        $this->assertSame('السيد', $this->faker->salutation);
        $this->assertSame('السيدة', $this->faker->salutationFemale);
        $this->assertSame('السيد', $this->faker->salutationMale);
    }
}
