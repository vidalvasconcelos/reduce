<?php

declare(strict_types=1);

namespace App\Domain\Addresses;

use App\Domain\User;

interface AddressBag
{
    public function getAddresses(): array;

    public function setAddress(Address $address): User;
}
