<?php

declare(strict_types=1);

namespace App\Validation;

final class AssertEnabled implements Validator
{
    public const DISABLED = 'disabled';

    public function __invoke(array $attribute): bool
    {
        if ($attribute[self::DISABLED] ?? true) {
            return false;
        }

        return true;
    }
}