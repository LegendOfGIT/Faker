<?php

namespace Faker;

use Faker\Exception\InterfaceNotImplementedException;
use Faker\Provider\PersonProvider;
use Faker\Provider\Provider;
use InvalidArgumentException;

/**
 * Faker
 * @property string firstName
 * @property string firstNameFemale
 * @property string firstNameMale
 * @property string lastName
 */
class Faker
{
    /**
     * @var Provider[]
     */
    protected $providers = [];

    protected $providerMapping = [
        'firstName' => PersonProvider::class,
        'firstNameFemale' => PersonProvider::class,
        'firstNameMale' => PersonProvider::class,
        'lastName' => PersonProvider::class,
    ];

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
     * @throws InvalidArgumentException
     */
    public function __get($name)
    {
        $provider = $this->getProviderByFormatter($name);

        return call_user_func([$provider, $name]);
    }

    /**
     * @param string $formatterName
     * @return Provider|null
     * @throws InvalidArgumentException
     */
    private function getProviderByFormatter($formatterName)
    {
        $providerClassName = $this->getProviderClassNameByFormatter($formatterName);
        foreach ($this->providers as $provider) {
            if ($provider instanceof $providerClassName) {
                return $provider;
            }
        }

        throw new InvalidArgumentException(sprintf('No provider for formatter "%s"', $formatterName));
    }

    /**
     * @param string $formatterName
     * @return string
     * @throws InvalidArgumentException
     */
    private function getProviderClassNameByFormatter($formatterName)
    {
        if (!array_key_exists($formatterName, $this->providerMapping)) {
            throw new InvalidArgumentException(sprintf('Unknown formatter "%s"', $formatterName));
        }

        return $this->providerMapping[$formatterName];
    }
}
