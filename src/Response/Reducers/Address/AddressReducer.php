<?php

declare(strict_types=1);

namespace App\Response\Reducers\Address;

use App\Domain\Addresses\Address;
use App\Domain\Addresses\AddressBag;

final class AddressReducer
{
    public function __invoke(AddressBag $bag, array $attributes): AddressBag
    {
        return $bag->setAddress(
            Address::fromArray($attributes)
        );
    }
}
