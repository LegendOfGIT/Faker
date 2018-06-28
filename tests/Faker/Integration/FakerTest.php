<?php

namespace Faker\Integration;

use Faker\Exception\InterfaceNotImplementedException;
use Faker\Faker;
use Faker\Provider\ru_RU\Person;
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
        $this->faker = new Faker();
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
        $this->assertSame('Александра', $this->faker->firstNameFemale);
        $this->assertSame('Абрам', $this->faker->firstNameMale);
        $this->assertSame('Смирнов', $this->faker->lastName);
    }
}
