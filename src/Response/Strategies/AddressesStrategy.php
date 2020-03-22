<?php

declare(strict_types=1);

namespace App\Response\Strategies;

use App\Domain\Addresses\Address;
use App\Domain\User;
use App\Domain\Schema;
use function array_reduce;

final class AddressesStrategy implements Strategy
{
    public function schema(): string
    {
        return Schema::ADDRESSES_BAG;
    }

    public function __invoke(User $user, array $attributes): User
    {
        if (!isset($attributes[$this->schema()])) {
            return $user;
        }

        return array_reduce($attributes[$this->schema()], static function (User $user, array $address): User {
            return $user->setAddress(Address::fromArray($address));
        }, clone $user);
    }
}
