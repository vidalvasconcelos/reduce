<?php

declare(strict_types=1);

namespace App;

interface AddressesBag
{
    /**
     * @const string
     */
    public const ADDRESSES_FIELD = 'addresses';

    /**
     * @return array
     */
    public function getAddresses(): array;
}
