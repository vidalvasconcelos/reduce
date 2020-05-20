<?php

declare(strict_types=1);

namespace Tests\Response\Reducers;

use App\Response\User;
use PHPUnit\Framework\TestCase;
use Tests\Response\FakeUser;
use Tests\Response\Strategies\StrategyTest;

class AddressesTest extends TestCase implements StrategyTest
{
    private User $user;

    protected function setUp(): void
    {
        $this->user = new FakeUser();
    }

    protected function tearDown(): void
    {
        unset($this->user);
    }

    public function test_expect_exception_when_bag_is_omitted(): void
    {

    }

    public function test_should_return_same_user(): void
    {

    }
}
