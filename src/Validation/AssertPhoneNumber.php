<?php

declare(strict_types=1);

namespace App\Validation;

use App\Response\Phone;

final class AssertPhoneNumber implements Validator
{
    public const NUMBER = 'number';

    public function __invoke(array $attribute): bool
    {
        if(! $number = $attribute[self::NUMBER] ?? false) {
            return false;
        }

        if (! preg_match("/\+\d{2,3} \(\d{2,3}\) \d{5}-\d{4}/", $number)) {
            return false;
        }

        return true;
    }
}