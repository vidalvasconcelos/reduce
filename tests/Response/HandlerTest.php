<?php

declare(strict_types=1);

namespace Tests\Response;

use App\Domain\User;
use App\Response\StrategyHandler;
use App\Response\Strategies\Strategy;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Tests\Domain\FakeUser;

final class HandlerTest extends TestCase
{
    use HandlerTestUseCases;

    private FakeUser $user;
    private StrategyHandler $handler;

    protected function setUp(): void
    {
        $this->handler = new StrategyHandler(
            $this->user = new FakeUser()
        );
    }

    /**
     * @dataProvider successfullyResponse
     * @param string $responseBody
     */
    public function test_when_reducers_is_empty_user_should_be_unchanged(string $responseBody): void
    {
        $response = new Response(200, [
            'Content-Type' => 'application/json'
        ], $responseBody);

        $userUpdated = $this->handler->handle($response);

        $this->assertSame($this->user->getPhones(), $userUpdated->getPhones());
        $this->assertSame($this->user->getAddresses(), $userUpdated->getAddresses());
    }

    /**
     * @dataProvider successfullyResponse
     * @param string $responseBody
     */
    public function test_should_remove_address_field(string $responseBody): void
    {
        $addresses = ['a', 'b', 'c'];
        $response = new Response(200, [
            'Content-Type' => 'application/json'
        ], $responseBody);

        $reducer = new class implements Strategy {
            public function __invoke(User $user, array $attributes): User
            {
                return $user->embed('addresses', ['a', 'b', 'c']);
            }
        };

        $userUpdated = $this->handler->handle($response, $reducer);

        $this->assertSame(
            $addresses,
            $userUpdated->getAddresses()
        );
    }
}
