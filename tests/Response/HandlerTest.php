<?php

declare(strict_types=1);

namespace TestsApp\Response;

use App\Response\Handler;
use PHPUnit\Framework\TestCase;
use Tests\Response\Factories\ResponseFactory;
use Tests\Response\Stubs\FakeUser;

class HandlerTest extends TestCase
{
    public function test_should_return_user_updated_with_response()
    {
        $fakeUser   = new FakeUser();
        $handle     = new Handler($fakeUser);

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
            $fakeUser->toAttributes()['phones']
        );
    }
}
