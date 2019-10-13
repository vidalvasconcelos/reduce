<?php

declare(strict_types=1);

namespace App\Response\Reducers;

use App\AddressesBag;
use App\Response\Validators\AddressValidator;
use App\User;

final class AddressesUserReducer implements UserReducer
{
    /**
     * {@inheritDoc}
     */
    public function __invoke(User $user, array $attribute): User
    {
        $addresses = $attribute[AddressesBag::ADDRESSES_FIELD] ?? [];

        $addresses = array_reduce($addresses, function (array $addresses, array $current) {
            $addresses[$current['id']] = $current;
            return $addresses;
        }, $user->getAddresses());

        return $user->embed(
            AddressesBag::ADDRESSES_FIELD,
            array_filter($addresses, new AddressValidator())
        );
    }
}
