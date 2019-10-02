<?php

declare(strict_types=1);

namespace App;

interface User
{
    public function fill(): array;

    public function toAttributes(): array;
}
