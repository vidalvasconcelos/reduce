<?php

declare(strict_types=1);

namespace App\Response\Reducers;

use App\PhonesBag;
use App\Response\Adapters\Adapter;
use App\User;

final class PhonesReducer implements Reducer
{
    /**
     * @var \App\Response\Adapters\Adapter
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
       return $user->embed(
            PhonesBag::PHONE_BAG,
            array_reduce($this->bag($attribute), $this->adapter, $user->getPhones())
       );
    }

    /**
     * @param array $attribute
     *
     * @return array
     */
    private function bag(array $attribute): array
    {
        return $attribute[PhonesBag::PHONE_BAG] ?? [];
    }
}
