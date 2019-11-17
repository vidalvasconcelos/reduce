<?php

declare(strict_types=1);

namespace App\Response;

interface Phone
{
    public const NUMBER     = 'number';
    public const TYPE       = 'type';
    public const CURRENT    = 'current';
    public const ACTIVE     = 'active';

    public const AVAILABLE_TYPES = [
        'cellphone',
        'landline',
    ];
}
