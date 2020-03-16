<?php

declare(strict_types=1);

namespace App\Domain\Addresses\ZipCodes;

use App\Domain\Addresses\ZipCodes\ZipCodeException;
use function preg_match;

final class ZipCode
{
    private string $zipCode;

    public function __construct(string $zipCode)
    {
        if (! preg_match("/\d{5}-\d{3}/", $zipCode)) {
            throw ZipCodeException::invalidPattern($zipCode);
        }

        $this->zipCode = $zipCode;
    }

    public function value(): string
    {
        return $this->zipCode;
    }
}