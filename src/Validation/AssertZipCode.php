<?php

declare(strict_types=1);

namespace App\Validation;

final class AssertZipCode implements Validator
{
    public const ZIP_CODE = 'zip_code';

    public const pattern = "/\d{5}-\d{3}/";

    public function __invoke(array $attribute): bool
    {
        if (! ($attribute[self::ZIP_CODE] ?? false)) {
            return false;
        }

        if (! preg_match("/\d{5}-\d{3}/", (string) $attribute[self::ZIP_CODE])) {
            return false;
        }

        return true;
    }
}