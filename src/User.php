<?php

declare(strict_types=1);

namespace App;

interface User
{
    /**
     * @param string $field
     * @param array  $attributes
     *
     * @return \App\User
     */
    public function embed(string $field, array $attributes): User;

    /**
     * @return array
     */
    public function toAttributes(): array;
}
