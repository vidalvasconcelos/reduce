<?php

declare(strict_types=1);

namespace App\Response;

interface User
{
    public function embed(string $field, array $attributes): User;
}
