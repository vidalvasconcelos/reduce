<?php

declare(strict_types=1);

namespace App\Domain\Addresses\ZipCodes;

use App\Domain\Addresses\AddressException;

final class ZipCodeException extends AddressException
{
    public static function invalidPattern(string $zipCode): self
    {
        return new static(
            sprintf('Invalid zip_code patterns: %s', $zipCode)
        );
    }
}