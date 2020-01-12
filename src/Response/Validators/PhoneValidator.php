<?php

declare(strict_types=1);

namespace App\Response\Validators;

use App\Response\Phone;

final class PhoneValidator implements Validator
{
    public function __invoke(array $attribute): bool
    {
        if (! ($attribute[Phone::ACTIVE] ?? false)) {
            return false;
        }

        if (! in_array($attribute[Phone::TYPE], Phone::AVAILABLE_TYPES)) {
            return false;
        }

        if(! $number = $attribute[Phone::NUMBER] ?? false) {
            return false;
        }

        if (! preg_match("/\+\d{2,3} \(\d{2,3}\) \d{5}-\d{4}/", $number)) {
            return false;
        }

        return true;
    }
}
