<?php

declare(strict_types=1);

namespace App\Response\Adapters;

final class AddressesAdapter
{
    /**
     * @param array $addresses
     * @param array $current
     * @return array
     */
    public function __invoke(array $addresses, array $current): array
    {
        $addressId = $current['id'];

        unset($current['id']);
        $addresses[$addressId] = $current;

        return $addresses;
    }
}
