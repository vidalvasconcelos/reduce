<?php

declare(strict_types=1);

namespace App;

interface AddressesBag
{
    public const ADDRESS_BAG = 'addresses';

    public const ADDRESS_CURRENT = 'current';

    public const STREET = 'street';

    public const ADDRESS_NUMBER = 'number';

    public const ZIP_CODE = 'zip_code';

    public const CITY = 'city';

    public function getAddresses(): array;
}
