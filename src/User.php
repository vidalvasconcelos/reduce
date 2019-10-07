<?php

declare(strict_types=1);

namespace App;

interface User
{
    public function fill(array $attributes): array;

    public function toAttributes(): array;
}
