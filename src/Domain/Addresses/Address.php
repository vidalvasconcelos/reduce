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

    private function hash(): string
    {
        return md5(sprintf(
            '%s.%s.%s',
            $this->street, $this->number, $this->zipCode->value()
        ));
    }

    public function isSame(Address $address): bool
    {
        return $this->hash() === $address->hash();
    }

    public static function fromArray(array $attribute): self
    {
        if (!isset($attribute['street'])) {
            throw AddressException::requiredFieldNotPassed('street');
        }

        if (!isset($attribute['zip_code'])) {
            throw AddressException::requiredFieldNotPassed('zip_code');
        }

        return new self(
            $attribute['street'],
            $attribute['number'] ??= null,
            new ZipCode($attribute['zip_code']),
        );
    }
}