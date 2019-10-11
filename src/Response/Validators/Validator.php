<?php

declare(strict_types=1);

namespace App\Response\Validators;

interface Validator
{
    /**
     * @param array $attribute
     *
     * @return bool
     */
    public function __invoke(array $attribute): bool;
}
