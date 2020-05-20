<?php

declare(strict_types=1);

use App\Response\User;
use Psr\Http\Message\ResponseInterface;
use App\Response\Handler;
use App\Response\Strategy;

function handlerFactory(Strategy ...$strategies): Closure
{
    return static function (ResponseInterface $response, User $user) use ($strategies): User {
        return array_reduce($strategies, new Handler($response), $user);
    };
}