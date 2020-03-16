<?php

declare(strict_types=1);

namespace Tests\Domain;

use App\Domain\Addresses\Address;
use App\Domain\Phones\Phone;
use App\Domain\User;
use App\Response\Schema;

final class FakeUser implements User, Schema
{
    private array $collection = [];

    /**
     * {@inheritDoc}
     */
    public function embed(string $field, array $attributes): User
    {
        $this->collection[$field] = $attributes;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getAddresses(): array
    {
        return $this->collection[self::ADDRESSES_BAG] ?? [];
    }

    /**
     * {@inheritDoc}
     */
    public function getPhones(): array
    {
        return $this->collection[self::PHONES_BAG] ?? [];
    }

    /**
     * {@inheritDoc}
     */
    public function setAddress(Address $address): User
    {
        $this->collection[self::ADDRESSES_BAG][] = $address;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setPhone(Phone $phone): User
    {
        $this->collection[self::PHONES_BAG][] = $phone;

        return $this;
    }
}
