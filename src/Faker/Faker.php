<?php

namespace Faker;

use Faker\Exception\InterfaceNotImplementedException;
use Faker\Provider\PersonProvider;
use Faker\Provider\Provider;
use InvalidArgumentException;

/**
 * Faker
 * @property string academicTitle
 * @property string academicTitleFemale
 * @property string academicTitleMale
 * @property string firstName
 * @property string firstNameFemale
 * @property string firstNameMale
 * @property string salutation
 * @property string salutationFemale
 * @property string salutationMale
 * @property string lastName
 */
class Faker
{
    /**
     * @var array
     */
    protected $genderNameMapping = [
        'academicTitle' => 'academicTitleMale',
        'firstName' => 'firstNameMale',
        'salutation' => 'salutationMale'
    ];

    /**
     * @var Provider[]
     */
    protected $providers = [];

    /**
     * @var array
     */
    protected $providerMapping = [
        'academicTitleFemale' => PersonProvider::class,
        'academicTitleMale' => PersonProvider::class,
        'firstNameFemale' => PersonProvider::class,
        'firstNameMale' => PersonProvider::class,
        'lastName' => PersonProvider::class,
        'salutationFemale' => PersonProvider::class,
        'salutationMale' => PersonProvider::class,
    ];

    /**
     * @param array|null $providerMapping
     */
    public function __construct(array $providerMapping = null)
    {
        if (null !== $providerMapping) {
            $this->providerMapping = $providerMapping;
        }
    }

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
        $name = $this->getDefaultGenderName($name);

        $provider = $this->getProviderByFormatter($name);

        return call_user_func([$provider, $name]);
    }

    /**
     * @param string $name
     * @return string
     */
    private function getDefaultGenderName($name)
    {
        if (array_key_exists($name, $this->genderNameMapping)) {
            return $this->genderNameMapping[$name];
        }

        return $name;
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
