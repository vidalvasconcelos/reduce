<?php

declare(strict_types=1);

namespace App\Validation;

final class AssertPhoneType implements Validator
{
    public const TYPE = 'type';

    public const AVAILABLE_TYPES = [
        'cellphone',
        'landline',
    ];

    public function __invoke(array $attribute): bool
    {
        if (! in_array($attribute[self::TYPE], self::AVAILABLE_TYPES)) {
            return false;
        }

        return true;
    }
}