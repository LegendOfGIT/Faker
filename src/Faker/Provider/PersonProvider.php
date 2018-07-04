<?php

namespace Faker\Provider;

/**
 * Person Provider interface
 */
interface PersonProvider
{
    /**
     * @return string
     * @example 'Dr.'
     */
    function academicTitleFemale();

    /**
     * @return string
     * @example 'Prof. Dr.'
     */
    function academicTitleMale();

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

    /**
     * @return string
     * @example 'Mrs.'
     */
    function salutationFemale();

    /**
     * @return string
     * @example 'Mr.'
     */
    function salutationMale();
}
