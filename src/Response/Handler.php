<?php

declare(strict_types=1);

namespace App\Response;

use App\Response\Reducers\ReducerBag;
use App\User;
use Psr\Http\Message\ResponseInterface;
use function array_reduce;

final class Handler
{
    private User $user;
    private array $reducers;

    public function  __construct(User $user, array $reducers)
    {
        $this->user = $user;
        $this->reducers = $reducers;
    }

    public function handle(ResponseInterface $response): User
    {
        return array_reduce($this->reducers, new Pipeline($response), $this->user);
    }
}
