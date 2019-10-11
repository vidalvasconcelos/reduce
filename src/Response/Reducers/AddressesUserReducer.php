<?php

declare(strict_types=1);

namespace App\Response\Reducers;

use App\User;

final class AddressesUserReducer implements UserReducer
{
    /**
     * {@inheritDoc}
     */
    public function __invoke(User $user, array $attribute): User
    {
        return $user;
    }
}
