<?php

declare(strict_types=1);

namespace App\Response\Reducers;

use App\Domain\User;

interface Reducer
{
    public function __invoke(User $user, array $attributes): User;
}
