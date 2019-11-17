<?php

declare(strict_types=1);

namespace App;

interface PhonesBag
{
    /**
     * @const string
     */
    public const PHONE_NUMBER = 'number';

    /**
     * @const string
     */
    public const TYPE = 'type';

    /**
     * @const string
     */
    public const PHONE_CURRENT = 'current';

    /**
     * @const string
     */
    public const PHONE_BAG = 'phones';

    /**
     * @return array
     */
    public function getPhones(): array;
}
