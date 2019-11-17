<?php

declare(strict_types=1);

namespace App\Response\Adapters;

interface Adapter
{
    /**
     * @param array $data
     * @param array $current
     *
     * @return array
     */
    public function __invoke(array $data, array $current): array;
}
