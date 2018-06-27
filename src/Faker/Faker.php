<?php

namespace Faker;

use Faker\Exception\InterfaceNotImplementedException;
use Faker\Provider\Provider;
use InvalidArgumentException;

/**
 * Faker
 * @property string firstName
 */
class Faker
{
    /**
     * @var Provider[]
     */
    protected $providers = [];

    /**
     * @param Provider|mixed $provider
     * @throws InterfaceNotImplementedException
     */
    public function addProvider($provider)
    {
        if (!($provider instanceof Provider)) {
            throw new InterfaceNotImplementedException();
        }

        array_unshift($this->providers, $provider);
    }

    /**
     * @return Provider[]
     */
    public function getProviders()
    {
        return $this->providers;
    }

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
