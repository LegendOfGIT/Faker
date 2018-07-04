<?php

namespace Faker\Provider\ar_JO;

use Faker\Provider\Provider;
use PHPUnit\Framework\TestCase;

/**
 * Tests of russian person provider
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
        $this->assertSame('السيدة', $this->provider->academicTitleFemale());
    }

    public function testProviderReturnsAcademicTitleMale()
    {
        $this->assertSame('السيد', $this->provider->academicTitleMale());
    }

    public function testProviderReturnsFirstNameFemale()
    {
        $this->assertSame('آثار', $this->provider->firstNameFemale());
    }

    public function testProviderReturnsFirstNameMale()
    {
        $this->assertSame('آدم', $this->provider->firstNameMale());
    }

    public function testProviderReturnsLastName()
    {
        $this->assertSame('آلهامي', $this->provider->lastName());
    }

    public function testProviderReturnsSalutationFemale()
    {
        $this->assertSame('الدكتورة', $this->provider->salutationFemale());
    }

    public function testProviderReturnsSalutationMale()
    {
        $this->assertSame('المهندس', $this->provider->salutationMale());
    }
}
