<?php

namespace Faker\Provider;

/**
 * Person Provider interface
 */
interface PersonProvider
{
    /**
     * @return string
     * @example 'Janette'
     */
    function firstNameFemale();

    /**
     * @return string
     * @example 'John'
     */
    function firstNameMale();

    /**
     * @return string
     * @example 'Doe'
     */
    function lastName();
}
