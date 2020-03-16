<?php

declare(strict_types=1);

namespace Tests\Domain;

use Iterator;

trait PhoneTestUseCases
{
    /**
     * @return Iterator
     */
    public function invalidFormatNumbers(): Iterator
    {
        yield 'Number without region code' => [
            '00000-0000'
        ];

        yield 'Number without separation char' => [
            '000000000'
        ];

        yield 'Equals instead of plus char' => [
            '=55 99999-9999'
        ];
    }

    /**
     * @return Iterator
     */
    public function invalidPhoneTypes(): Iterator
    {
        yield 'Number without region code' => [
            'GENERIC'
        ];

        yield 'Number without separation char' => [
            'FIXED'
        ];

        yield 'Equals instead of plus char' => [
            'SMARTPHONE'
        ];
    }
}