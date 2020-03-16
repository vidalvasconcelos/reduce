<?php

declare(strict_types=1);

namespace App\Domain;

use App\Domain\Addresses\AddressBag;
use App\Domain\Phones\PhoneBag;

interface User extends AddressBag, PhoneBag
{
    public function embed(string $field, array $attributes): User;

    public function attributes(): array;
}
