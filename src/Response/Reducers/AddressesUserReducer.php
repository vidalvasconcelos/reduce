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
        $addresses = array_reduce(
            $this->getAddressesAttributes($attribute),
            new AddressesAggregator(),
            $user->getAddresses()
        );

        return $user->embed(
            AddressesBag::ADDRESSES_FIELD,
            array_filter($addresses, new AddressValidator())
        );
    }

    /**
     * @param array $attribute
     * @return array
     */
    private function getAddressesAttributes(array $attribute): array
    {
        return $attribute[AddressesBag::ADDRESSES_FIELD] ?? [];
    }
}
