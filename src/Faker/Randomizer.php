<?php

namespace Faker;

/**
 * Interface of randomizer
 */
interface Randomizer
{
    /**
     * @param array $elements
     * @return mixed
     */
    function getRandomizedElement(array $elements);

    /**
     * @param array $elements
     * @return array
     */
    function getRandomizedElements(array $elements);
}
