<?php

declare(strict_types=1);

namespace App\Response\Reducers\Address;

use App\Domain\User;
use App\Response\Schema;
use function array_reduce;

final class AddressBagReducer
{
    public function __invoke(User $user, array $attributes): User
    {
        if (! array_key_exists(Schema::ADDRESSES_BAG, $attributes)) {
            throw AddressReducerException::isRequired();
        }

        if ($addresses = $attributes[Schema::ADDRESSES_BAG]) {
            return $user;
        }

        return array_reduce($addresses, new AddressReducer(), $user);
    }
}
