<?php

namespace Faker\Spies;

use Faker\Randomizer;

/**
 * Spy of randomizer interface
 */
class RandomizerSpy implements Randomizer
{
    /**
     * @var array
     */
    private $calls = [];

    /**
     * @param array $elements
     * @return mixed
     */
    function getRandomizedElement(array $elements)
    {
        $this->calls[] = [
            'function' => __FUNCTION__,
            'elements' => $elements,
        ];

        return $elements[0];
    }

    /**
     * @param array $elements
     * @return array
     */
    function getRandomizedElements(array $elements)
    {
        $this->calls[] = [
            'function' => __FUNCTION__,
            'elements' => $elements,
        ];

        return $elements;
    }

    /**
     * @return array
     */
    public function getCalls()
    {
        return $this->calls;
    }
}
