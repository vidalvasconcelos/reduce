<?php

declare(strict_types=1);

namespace App\Response\Reducers;

use App\PhonesBag;
use App\Response\Adapters\Adapter;
use App\User;

final class PhonesReducer implements Reducer
{
    private Adapter $adapter;

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
    }

    public function __invoke(User $user, array $attribute): User
    {
       return $user->embed(
            PhonesBag::PHONE_BAG,
            array_reduce($this->bag($attribute), $this->adapter, $user->getPhones())
       );
    }

    private function bag(array $attribute): array
    {
        return $attribute[PhonesBag::PHONE_BAG] ?? [];
    }
}
