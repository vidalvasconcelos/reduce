<?php

declare(strict_types=1);

namespace App\Response\Reducers;

use App\AddressesBag;
use App\Response\Adapters\Adapter;
use App\User;

final class AddressesReducer implements Reducer
{
    /**
     * @var \App\Response\Transformers\Transformer
     */
    private $adapter;

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * {@inheritDoc}
     */
    public function __invoke(User $user, array $attribute): User
    {
        $addresses = $this->bag($attribute);

        return $user->embed(
            AddressesBag::ADDRESS_BAG,
            array_reduce($addresses, $this->adapter, $user->getAddresses())
        );
    }

    /**
     * @param array $attribute
     *
     * @return array
     */
    private function bag(array $attribute): array
    {
        return $attribute[AddressesBag::ADDRESS_BAG] ?? [];
    }
}
