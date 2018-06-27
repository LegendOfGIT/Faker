<?php

namespace Faker\Spies;

use Faker\Provider\PersonProvider;
use Faker\Provider\Provider;

/**
 * Spy of a person provider
 */
class PersonProviderSpy implements Provider, PersonProvider
{
    const FIRST_NAME = 'John';
    const LAST_NAME = 'Doe';

    /**
     * @var string[]
     */
    private $calledFormatters = [];

    /**
     * @param string|null $gender
     * @return string
     * @example 'John'
     */
    function firstName($gender = null)
    {
        $this->calledFormatters[] = __FUNCTION__;
        return static::FIRST_NAME;
    }

    /**
     * @param string|null $gender
     * @return string
     * @example 'Doe'
     */
    function lastName($gender = null)
    {
        $this->calledFormatters[] = __FUNCTION__;
        return static::LAST_NAME;
    }

    /**
     * @return string[]
     */
    public function getCalledFormatters()
    {
        return $this->calledFormatters;
    }
}
