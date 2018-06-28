<?php

namespace Faker\Spies;

use Faker\Provider\PersonProvider;
use Faker\Provider\Provider;

/**
 * Spy of a person provider
 */
class PersonProviderSpy implements Provider, PersonProvider
{
    const FIRST_NAME_FEMALE = 'Janette';
    const FIRST_NAME_MALE = 'John';
    const LAST_NAME = 'Doe';

    /**
     * @var string[]
     */
    private $calledFormatters = [];

    /**
     * @return string
     * @example 'Janette'
     */
    function firstNameFemale()
    {
        $this->calledFormatters[] = __FUNCTION__;
        return static::FIRST_NAME_FEMALE;
    }

    /**
     * @return string
     * @example 'John'
     */
    function firstNameMale()
    {
        $this->calledFormatters[] = __FUNCTION__;
        return static::FIRST_NAME_MALE;
    }

    /**
     * @return string
     * @example 'Doe'
     */
    function lastName()
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
