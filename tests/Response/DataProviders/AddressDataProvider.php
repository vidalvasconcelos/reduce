<?php

declare(strict_types=1);

namespace Tests\Response\DataProviders;

use Iterator;

trait AddressDataProvider
{
    /**
     * @return Iterator
     */
    public function invalidZipCodeFormat(): Iterator
    {
        yield 'Four digits after divisors char' => [
            '00000-0000'
        ];

        yield 'Without divsor char' => [
            '00000000'
        ];
    }
}
