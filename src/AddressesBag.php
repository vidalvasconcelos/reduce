<?php

declare(strict_types=1);

namespace App;

interface AddressesBag
{
    /**
     * @const string
     */
    public const ADDRESS_BAG = 'addresses';

    /**
     * @const string
     */
    public const ADDRESS_CURRENT = 'current';

    /**
     * @const string
     */
    public const STREET = 'street';

    /**
     * @const string
     */
    public const ADDRESS_NUMBER = 'number';

    /**
     * @const string
     */
    public const ZIP_CODE = 'zip_code';

    /**
     * @const string
     */
    public const CITY = 'city';

    /**
     * @return array
     */
    public function getAddresses(): array;
}
