<?php

declare(strict_types=1);

namespace App\Response;

interface Address
{
    public const ID         = 'address_id';
    public const CURRENT    = 'current';
    public const STREET     = 'street';
    public const NUMBER     = 'number';
    public const ZIP_CODE   = 'zip_code';
    public const CITY       = 'city';
    public const DISABLED   = 'disabled';
}
