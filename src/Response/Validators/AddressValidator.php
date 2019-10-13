<?php

declare(strict_types=1);

namespace App\Response\Validators;

final class AddressValidator implements Validator
{
    public function __invoke(array $attribute): bool
    {
        return ! $attribute['disabled'] ?? false;
    }
}
