<?php

declare(strict_types=1);

namespace Tests\Response\Stubs;

use App\Domain\User;

final class FakeUser implements User
{
    /**
     * This property simulate a user collection
     * state on Storage
     *
     * @var array
     */
    private $attributes = [];

    /**
     * {@inheritDoc}
     */
    public function embed(string $field, array $attributes): User
    {
        $this->attributes[$field] = $attributes;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function attributes(): array
    {
        return $this->attributes;
    }

    /**
     * {@inheritDoc}
     */
    public function getAddresses(): array
    {
        return $this->attributes[self::ADDRESS_BAG];
    }

    /**
     * {@inheritDoc}
     */
    public function getPhones(): array
    {
        return $this->attributes[self::PHONE_BAG];
    }
}
