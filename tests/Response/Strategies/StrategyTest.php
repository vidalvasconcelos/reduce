<?php

declare(strict_types=1);

namespace Tests\Response\Strategies;


interface StrategyTest
{
    public function test_expect_exception_when_bag_is_omitted(): void;

    public function test_should_return_same_user(): void;
}
