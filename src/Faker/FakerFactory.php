<?php

namespace Faker;

/**
 * Faker factory
 */
class FakerFactory
{
    /**
     * @return Faker
     */
    public static function build()
    {
        return new Faker();
    }
}
