<?php

namespace Faker\Provider;

/**
 * Person Provider interface
 */
interface PersonProvider
{
    /**
     * @return array
     * @example 'Dr.'
     */
    function academicTitlesFemale();

    /**
     * @return array
     * @example 'Prof. Dr.'
     */
    function academicTitlesMale();

    /**
     * @return array
     * @example 'Janette'
     */
    function firstNamesFemale();

    /**
     * @return array
     * @example 'John'
     */
    function firstNamesMale();

    /**
     * @return array
     * @example 'Doe'
     */
    function lastNames();

    /**
     * @return array
     * @example 'Mrs.'
     */
    function salutationsFemale();

    /**
     * @return array
     * @example 'Mr.'
     */
    function salutationsMale();
}
