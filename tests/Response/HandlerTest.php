<?php

declare(strict_types=1);

namespace Tests\Response;

use App\Domain\User;
use App\Response\Handler;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Tests\Domain\FakeUser;

final class HandlerTest extends TestCase
{
    use HandlerTestUseCases;

    /**
     * @dataProvider successfullyResponse
     * @param string $responseBody
     */
    public function test_when_reducers_is_empty_user_should_be_unchanged(string $responseBody): void
    {
        $user = new FakeUser();
        $response = new Response(
            200,
            ['Content-Type' => 'application/json'],
            $responseBody
        );

        $handler = new Handler([]);
        $userUpdated = $handler->handle($user, $response);

        $this->assertSame(
            $user->getAddresses(),
            $userUpdated->getAddresses()
        );

        $this->assertSame(
            $user->getPhones(),
            $userUpdated->getPhones()
        );
    }

    /**
     * @dataProvider successfullyResponse
     * @param string $responseBody
     */
    public function test_should_remove_address_field(string $responseBody): void
    {
        $user = new FakeUser();
        $addresses = ['a', 'b', 'c'];
        $response = new Response(
            200,
            ['Content-Type' => 'application/json'],
            $responseBody
        );

        $handler = new Handler([
            static function (User $user, array $attributes) use ($addresses): User {
                return $user->embed('addresses', $addresses);
            },
        ]);

        $userUpdated = $handler->handle($user, $response);

        $this->assertSame(
            ['a', 'b', 'c'],
            $userUpdated->getAddresses()
        );
    }
}
