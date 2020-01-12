<?php

declare(strict_types=1);

namespace App;

interface User extends AddressesBag, PhonesBag
{
    public function embed(string $field, array $attributes): User;

    public function attributes(): array;
}
