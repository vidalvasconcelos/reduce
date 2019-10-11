<?php

declare(strict_types=1);

namespace App\Response\Validators;

final class PhoneValidator implements Validator
{
    public function __invoke(array $attribute): bool
    {
        if (! $value = preg_match("/\+\d{2,3} \(\d{2,3}\) \d{5}-\d{4}/", $attribute['number'])) {
            return false;
        }

        return (bool) $attribute['active'];
    }
}
