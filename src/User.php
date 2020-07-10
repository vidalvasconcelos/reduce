<?php

declare(strict_types=1);

namespace App;

interface User
{
    /**
     * This method attach an array of values in the specific field
     *
     * @param string $field
     * @param array $attributes
     * @return User
     */
    public function attach(string $field, array $attributes): User;
}
