<?php

declare(strict_types=1);

namespace App\Response\Reducers;

use App\User;

interface UserReducer
{
    /**
     * @param \App\User $user
     * @param array     $attribute
     *
     * @return \App\User
     */
    public function __invoke(User $user, array $attribute): User;
}
