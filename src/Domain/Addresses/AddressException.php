<?php

declare(strict_types=1);

namespace App\Domain\Addresses;

use InvalidArgumentException;

class AddressException extends InvalidArgumentException
{
    public static function requiredFieldNotPassed(string $field): self
    {
        return new static(sprintf(
            '"%s" is required.',
            $field
        ));
    }
}