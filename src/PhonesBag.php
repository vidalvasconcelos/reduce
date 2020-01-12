<?php

declare(strict_types=1);

namespace App;

interface PhonesBag
{
    public const PHONE_NUMBER = 'number';

    public const TYPE = 'type';

    public const PHONE_CURRENT = 'current';

    public const PHONE_BAG = 'phones';

    public function getPhones(): array;
}
