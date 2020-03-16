<?php

declare(strict_types=1);

namespace App\Domain\Phones;

use InvalidArgumentException;

final class PhoneException extends InvalidArgumentException
{
    public static function isDisabled(): self
    {
        return new static(
            'Only enabled phones was permitted.'
        );
    }

    public static function invalidPattern(string $number): self
    {
        return new static(
            sprintf('Invalid phone pattern: %s', $number)
        );
    }

    public static function invalidType(string $type): self
    {
        return new static(
            sprintf('Invalid type: %s', $type)
        );
    }
}