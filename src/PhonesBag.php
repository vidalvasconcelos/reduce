<?php

declare(strict_types=1);

namespace App;

interface PhonesBag
{
    /**
     * @const string
     */
    public const PHONES_FIELD = 'phones';

    /**
     * @return array
     */
    public function getPhones(): array;
}
