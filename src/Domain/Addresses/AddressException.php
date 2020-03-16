<?php

declare(strict_types=1);

namespace App\Domain\Addresses;

use InvalidArgumentException;

final class AddressException extends InvalidArgumentException
{
    public static function streetShouldBeString(): self
    {
        return new static('"street" field should be string.');
    }

    public static function streetIsRequired(): self
    {
        return new static('Field street is required.');
    }

    public static function zipCodeMissing(): self
    {
        return new static('Zip code was missing.');
    }
}