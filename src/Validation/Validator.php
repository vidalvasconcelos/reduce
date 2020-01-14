<?php

namespace App\Validation;

interface Validator
{
    public function __invoke(array $attribute): bool;
}