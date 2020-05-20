<?php

declare(strict_types=1);

namespace App\Response;

interface Strategy
{
    public function schema(): string;

    public function __invoke(User $user, array $attributes): User;
}