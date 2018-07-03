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

    public function testProviderReturnsFemaleFirstName()
    {
        $this->assertSame('آثار', $this->provider->firstNameFemale());
    }

    public function testProviderReturnsMaleFirstName()
    {
        $this->assertSame('آدم', $this->provider->firstNameMale());
    }
}
