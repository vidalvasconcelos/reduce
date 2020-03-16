<?php

declare(strict_types=1);

namespace App\Response\Reducers\Address;

use App\Domain\Addresses\Address;
use App\Domain\Addresses\AddressBag;
use App\Domain\User;
use App\Response\Reducers\Reducer;

final class AddressReducer implements Reducer
{
    public function __invoke(AddressBag $bag, array $attributes): User
    {
        return $bag->setAddress(
            Address::fromArray($attributes)
        );
    }
}
