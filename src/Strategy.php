<?php

declare(strict_types=1);

namespace App;

interface Strategy
{
    public function __invoke(User $user, array $attributes): User;
}