<?php

declare(strict_types=1);

namespace Tests\Domain\Addresses;

use Iterator;

trait AddressTestUseCases
{
    /**
     * @return Iterator
     */
    public function validAddresses(): Iterator
    {
        yield [
            [
                'street'    => 'Rua jackson',
                'number'    => 254,
                'zip_code'  => '23345-300',
            ]
        ];

        yield [
            [
                'street'    => 'Rua jackson',
                'number'    => '',
                'zip_code'  => '00345-300',
            ]
        ];
    }

    /**
     * @return Iterator
     */
    public function invalidAddresses(): Iterator
    {
        yield  '"street" is omitted' => [
            [
                'number'    => 254,
                'zip_code'  => '23345-300',
            ]
        ];

        yield  '"street" is empty' => [
            [
                'street'    => '',
                'number'    => 254,
            ]
        ];

        yield  '"street" is null' => [
            [
                'street'    => null,
                'number'    => 254,
                'zip_code'  => '23345-300',
            ]
        ];

        yield  '"zip_code" is omitted' => [
            [
                'street'    => 'rua jackson',
                'number'    => 254,
            ]
        ];

        yield  '"zip_code" is empty' => [
            [
                'street'    => 'rua jackson',
                'number'    => 254,
                'zip_code'  => '',
            ]
        ];

        yield  '"zip_code" is null' => [
            [
                'street'    => 'rua jackson',
                'number'    => 254,
                'zip_code'  => null,
            ]
        ];
    }
}
