<?php

namespace Faker\Spies;

use Faker\Provider\PersonProvider;
use Faker\Provider\Provider;

/**
 * Spy of a person provider
 */
class PersonProviderSpy implements Provider, PersonProvider
{
    const ACADEMIC_TITLE_FEMALE = 'Dr.';
    const ACADEMIC_TITLE_MALE = 'Prof. Dr.';
    const FIRST_NAME_FEMALE = 'Janette';
    const FIRST_NAME_MALE = 'John';
    const LAST_NAME = 'Doe';
    const SALUTATION_FEMALE = 'Mrs.';
    const SALUTATION_MALE = 'Mr.';

    /**
     * @var string[]
     */
    private $calledFormatters = [];

    /**
     * @return string
     * @example 'Dr.'
     */
    function academicTitleFemale()
    {
        $this->calledFormatters[] = __FUNCTION__;
        return static::ACADEMIC_TITLE_FEMALE;
    }

    /**
     * @return string
     * @example 'Prof. Dr.'
     */
    function academicTitleMale()
    {
        $this->calledFormatters[] = __FUNCTION__;
        return static::ACADEMIC_TITLE_MALE;
    }

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
     * @return string
     * @example 'Mrs.'
     */
    function salutationFemale()
    {
        $this->calledFormatters[] = __FUNCTION__;
        return static::SALUTATION_FEMALE;
    }

    /**
     * @return string
     * @example 'Mr.'
     */
    function salutationMale()
    {
        $this->calledFormatters[] = __FUNCTION__;
        return static::SALUTATION_MALE;
    }

    /**
     * @return string[]
     */
    public function getCalledFormatters()
    {
        return $this->calledFormatters;
    }
}
