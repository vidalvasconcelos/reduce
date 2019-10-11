<?php

declare(strict_types=1);

namespace Tests\Response;

use App\Response\Handler;
use PHPUnit\Framework\TestCase;
use Tests\Response\Factories\ResponseFactory;
use Tests\Response\Stubs\FakeUser;

class HandlerTest extends TestCase
{
    public function test_should_return_user_updated_with_response()
    {
        $fakeUser = new FakeUser();

        $handle = new Handler($fakeUser->embed('phones', [
            'phones' => [
                [
                    'type' => 'cellphone',
                    'phone_number' => '+55 (11) 12345-4567',
                ]
            ],
        ]));

        $response = ResponseFactory::buildFromFixture(
            __DIR__ . '/Factories/fixtures/response_payload.json'
        );

        $fakeUser = $handle->handle($response);

        $this->assertSame(
            [
                [
                    "active"    => true,
                    "type"      => "cellphone",
                    "number"    => "+55 (26) 12345-4567",
                ]
            ],
            $fakeUser->attributes()['phones']
        );
    }
}
