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
    const FIRST_NAME_MALE_A = 'John';
    const FIRST_NAME_MALE_B = 'Jim';
    const LAST_NAME = 'Doe';
    const SALUTATION_FEMALE = 'Mrs.';
    const SALUTATION_MALE = 'Mr.';

    /**
     * @var string[]
     */
    private $calledFormatters = [];

    /**
     * @return array
     * @example 'Dr.'
     */
    function academicTitlesFemale()
    {
        $this->calledFormatters[] = __FUNCTION__;
        return [static::ACADEMIC_TITLE_FEMALE];
    }

    /**
     * @return array
     * @example 'Prof. Dr.'
     */
    function academicTitlesMale()
    {
        $this->calledFormatters[] = __FUNCTION__;
        return [static::ACADEMIC_TITLE_MALE];
    }

    /**
     * @return array
     * @example 'Janette'
     */
    function firstNamesFemale()
    {
        $this->calledFormatters[] = __FUNCTION__;
        return [static::FIRST_NAME_FEMALE];
    }

    /**
     * @return array
     * @example 'John'
     */
    function firstNamesMale()
    {
        $this->calledFormatters[] = __FUNCTION__;
        return [static::FIRST_NAME_MALE_A, static::FIRST_NAME_MALE_B];
    }

    /**
     * @return array
     * @example 'Doe'
     */
    function lastNames()
    {
        $this->calledFormatters[] = __FUNCTION__;
        return [static::LAST_NAME];
    }

    /**
     * @return array
     * @example 'Mrs.'
     */
    function salutationsFemale()
    {
        $this->calledFormatters[] = __FUNCTION__;
        return [static::SALUTATION_FEMALE];
    }

    /**
     * @return array
     * @example 'Mr.'
     */
    function salutationsMale()
    {
        $this->calledFormatters[] = __FUNCTION__;
        return [static::SALUTATION_MALE];
    }

    /**
     * @return string[]
     */
    public function getCalledFormatters()
    {
        return $this->calledFormatters;
    }
}
