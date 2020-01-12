<?php

declare(strict_types=1);

namespace App\Response\Reducers;

use App\User;

interface Reducer
{
    public function __invoke(User $user, array $attribute): User;
}
