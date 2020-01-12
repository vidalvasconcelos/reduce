<?php

declare(strict_types=1);

namespace App\Response\Validators;

interface Validator
{
    public function __invoke(array $attribute): bool;
}
