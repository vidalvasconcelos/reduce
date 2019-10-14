<?php

declare(strict_types=1);

namespace App\Response\Reducers;

final class AddressesAggregator
{
    public function __invoke(array $addresses, array $current): array
    {
        $addressId = $current['id'];

        unset($current['id']);
        $addresses[$addressId] = $current;

        return $addresses;
    }
}
