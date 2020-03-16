<?php


namespace Tests\Domain;

use Iterator;

trait ZipCodeTestUseCases
{
    /**
     * @return Iterator
     */
    public function invalidZipCodeFormat(): Iterator
    {
        yield 'Empty string' => [
            ''
        ];

        yield 'Without char divisor' => [
            '065889934'
        ];
    }

    /**
     * @return Iterator
     */
    public function validZipCodeFormat(): Iterator
    {
        yield 'Green Water' => [
            '61895-974'
        ];

        yield 'Black river' => [
            '79470-971'
        ];
    }
}