<?php

declare(strict_types=1);

namespace App\Validation;

final class AssertActive implements Validator
{
    public const ACTIVE = 'active';

    public function __invoke(array $attribute): bool
    {
        if (! ($attribute[self::ACTIVE] ?? false)) {
            return false;
        }

        return true;
    }
}