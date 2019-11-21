<?php

declare(strict_types=1);

namespace App\Response\Validators;

use App\Response\Address;

final class AddressValidator implements Validator
{
    public function __invoke(array $attribute): bool
    {
        if ($attribute[Address::DISABLED] ?? true) {
            return false;
        }

        if (! ($attribute[Address::ZIP_CODE] ?? false)) {
            return false;
        }

        if (! preg_match("/\d{5}-\d{3}/", (string) $attribute[Address::ZIP_CODE])) {
            return false;
        }

        return true;
    }
}
