<?php

declare(strict_types=1);

namespace App\Response\Adapters;

interface Adapter
{
    public function __invoke(array $data, array $current): array;
}
