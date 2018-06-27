<?php

namespace Faker;

use PHPUnit\Framework\TestCase;

/**
 * Tests of faker factory
 */
class FakerFactoryTest extends TestCase
{
    public function testFactoryReturnsNewInstanceOfFaker()
    {
        $this->assertInstanceOf(Faker::class, FakerFactory::build());
    }
}
