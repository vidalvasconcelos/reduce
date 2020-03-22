<?php

declare(strict_types=1);

use App\Domain\User;
use Psr\Http\Message\ResponseInterface;
use App\Response\Handler;
use App\Response\Strategies\Strategy;

function updateFromResponse(Strategy ...$strategies): Closure
{
    return static function (ResponseInterface $response, User $user) use ($strategies): User {
        return array_reduce($strategies, new Handler($response), $user);
    };
}