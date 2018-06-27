<?php

namespace Faker\Provider;

/**
 * Person Provider interface
 */
interface PersonProvider
{
    const GENDER_FEMALE = 'female';
    const GENDER_MALE = 'male';

    /**
     * @param string|null $gender
     * @return string
     * @example 'John'
     */
    function firstName($gender = null);

    /**
     * @param string|null $gender
     * @return string
     * @example 'Doe'
     */
    function lastName($gender = null);
}
