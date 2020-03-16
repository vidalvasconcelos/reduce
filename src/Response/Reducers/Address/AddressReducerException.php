<?php

declare(strict_types=1);

namespace App\Response\Reducers\Address;

use InvalidArgumentException;

final class AddressReducerException extends InvalidArgumentException
{
    public static function isRequired(): self
    {
        return new static('"addresses" is a required field.');
    }
}