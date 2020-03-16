<?php

declare(strict_types=1);

namespace App\Domain\Addresses;

interface AddressBag
{
    public function getAddresses(): array;

    public function setAddress(Address $address): self;
}
