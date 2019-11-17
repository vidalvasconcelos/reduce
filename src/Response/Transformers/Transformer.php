<?php

declare(strict_types=1);

namespace App\Response\Transformers;

interface Transformer
{
    public function __invoke(array $current): array;
}
