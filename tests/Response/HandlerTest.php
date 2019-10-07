<?php

declare(strict_types=1);

namespace TestsApp\Response;

use App\Response\Handler;
use PHPUnit\Framework\TestCase;
use Tests\Response\Factories\ResponseFactory;
use Tests\Response\Stubs\UserFake;

class HandlerTest extends TestCase
{
    public function test_should_return_user_updated_with_response()
    {
        $user   = new UserFake();
        $handle = new Handler($user);

        $response = ResponseFactory::buildFromArray([
            'phones' => [
                [
                    'type' => 'landline',
                    'phone_number' => '+21 (26) 12345-4567',
                ],
                [
                    'active' => true,
                    'type' => 'cellphone',
                    'phone_number' => '+11 (35) 98765-1243',
                ],
            ],
        ]);

        $expected = [
            [
                'active' => true,
                'type' => 'cellphone',
                'phone_number' => '+11 (35) 98765-1243',
            ],
            [
                'active' => false,
                'type' => 'landline',
                'phone_number' => '+21 (26) 12345-4567',
            ],
        ];

        $user = $handle->handle($response);

        $this->assertSame(
            [],
            $user->toAttributes()
        );
    }
}
