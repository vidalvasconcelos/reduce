<?php

declare(strict_types=1);

namespace Tests\DataProviders;

use Faker\Provider\Uuid;
use Iterator;

trait AddressTestUseCases
{
    /**
     * @return Iterator
     */
    public function disabledAddresses(): Iterator
    {
        yield  'Disabled field implicit' => [
            [
                'id'        => Uuid::uuid(),
                'current'   => false,
                'street'    => 'rua jackson',
                'number'    => 254,
                'zip_code'  => '23345-300',
                'city'      => '0001',
            ]
        ];

        yield  'Disabled field explicit' => [
            [
                'id'        => Uuid::uuid(),
                'current'   => false,
                'disabled'   => true,
                'street'    => 'rua jackson',
                'number'    => 254,
                'zip_code'  => '23345-300',
                'city'      => '0001',
            ]
        ];
    }
}
