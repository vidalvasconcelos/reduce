<?php

declare(strict_types=1);

namespace App\Domain\Addresses;

use InvalidArgumentException;

final class AddressException extends InvalidArgumentException
{
    public static function streetIsRequired(): self
    {
        return new static(
            '"street" is required.'
        );
    }

    public static function zipCodeMissing(): self
    {
        return new static(
            '"zip_code" ir required.'
        );
    }
}