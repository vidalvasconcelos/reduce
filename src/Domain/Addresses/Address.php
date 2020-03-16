<?php

declare(strict_types=1);

namespace App\Domain\Addresses;

use App\Domain\Addresses\ZipCodes\ZipCode;

final class Address
{
    public string $street;
    public ?int $number;
    public ZipCode $zipCode;

    private function __construct(string $street, ?int $number, ZipCode $zipCode)
    {
        $this->street = $street;
        $this->number = $number;
        $this->zipCode = $zipCode;
    }

    public static function fromArray(array $attribute): self
    {
        if (array_key_exists('zip_code', $attribute)) {
            throw AddressException::zipCodeMissing();
        }

        if (array_key_exists('street', $attribute)) {
            throw AddressException::streetIsRequired();
        }

        return new self(
            $attribute['street'] ?? '',
            $attribute['number'] ?? null,
            $attribute['zip_code'],
        );
    }
}