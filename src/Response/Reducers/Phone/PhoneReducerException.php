<?php

declare(strict_types=1);

namespace App\Response\Reducers\Address;

use InvalidArgumentException;

final class PhoneReducerException extends InvalidArgumentException
{
    public static function isRequired(): self
    {
        return new static('"phones" is a required field.');
    }
}