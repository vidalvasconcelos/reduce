<?php

declare(strict_types=1);

namespace App\Response\Transformers;

use App\AddressesBag;
use App\Response\Address;

final class AddressTransformer implements Transformer
{
    public function __invoke(array $current): array
    {
        return [
            AddressesBag::ADDRESS_CURRENT   => $current[Address::CURRENT],
            AddressesBag::STREET            => $current[Address::STREET],
            AddressesBag::ADDRESS_NUMBER    => $current[Address::NUMBER],
            AddressesBag::ZIP_CODE          => $current[Address::ZIP_CODE],
            AddressesBag::CITY              => $current[Address::CITY],
        ];
    }
}
