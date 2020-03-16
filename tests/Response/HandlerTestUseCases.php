<?php

declare(strict_types=1);

namespace Tests\Response;

use Iterator;

trait HandlerTestUseCases
{
    public function successfullyResponse(): Iterator
    {
        yield 'Complete response' => [
            file_get_contents(__DIR__ . '/.fixtures/success.json')
        ];

        yield 'Addresses empty' => [
            file_get_contents(__DIR__ . '/.fixtures/success.addresses_empty.json')
        ];

        yield 'Phones empty' => [
            file_get_contents(__DIR__ . '/.fixtures/success.phones_empty.json')
        ];
    }
}