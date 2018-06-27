<?php

namespace Faker;

use InvalidArgumentException;

/**
 * Faker
 * @property string firstName
 */
class Faker
{
    /**
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        if (method_exists($this, $name)) {
            return call_user_func([$this, $name]);
        }

        throw new InvalidArgumentException(sprintf('Unknown formatter "%s"', $name));
    }
}
