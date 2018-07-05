<?php

namespace Faker\Provider\ar_SA;

use Faker\Provider\Provider;
use PHPUnit\Framework\TestCase;

/**
 * Tests of saudi arabian person provider
 */
class PersonTest extends TestCase
{
    /**
     * @var Person
     */
    private $provider;

    public function setUp()
    {
        $this->provider = new Person();
    }

    public function testProviderImplementsProviderInterface()
    {
        $this->assertInstanceOf(
            Provider::class,
            $this->provider,
            'class does not implement required interface'
        );
    }

    public function testProviderReturnsAcademicTitleFemale()
    {
        $this->assertSame('الدكتورة', $this->provider->academicTitlesFemale()[0]);
    }

    public function testProviderReturnsAcademicTitleMale()
    {
        $this->assertSame('الأستاذ', $this->provider->academicTitlesMale()[0]);
    }

    public function testProviderReturnsFirstNameFemale()
    {
        $this->assertSame('آثار', $this->provider->firstNamesFemale()[0]);
    }

    public function testProviderReturnsFirstNameMale()
    {
        $this->assertSame('آدم', $this->provider->firstNamesMale()[0]);
    }

    public function testProviderReturnsLastName()
    {
        $this->assertSame('العتيبي', $this->provider->lastNames()[0]);
    }

    public function testProviderReturnsSalutationFemale()
    {
        $this->assertSame('السيدة', $this->provider->salutationsFemale()[0]);
    }

    public function testProviderReturnsSalutationMale()
    {
        $this->assertSame('السيد', $this->provider->salutationsMale()[0]);
    }
}
