<?php

declare(strict_types=1);

namespace App\Response\Reducers;

use App\AddressesBag;
use App\Response\Adapters\Adapter;
use App\User;

final class AddressesReducer implements Reducer
{
    private Adapter $adapter;

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
    }

    public function __invoke(User $user, array $attribute): User
    {
        $addresses = $this->bag($attribute);

        return $user->embed(
            AddressesBag::ADDRESS_BAG,
            array_reduce($addresses, $this->adapter, $user->getAddresses())
        );
    }

    private function bag(array $attribute): array
    {
        return $attribute[AddressesBag::ADDRESS_BAG] ?? [];
    }
}
