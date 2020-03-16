<?php

declare(strict_types=1);

namespace App\Response;

use App\Domain\User;
use Psr\Http\Message\ResponseInterface;
use function array_reduce;

final class Handler
{
    private array $reducers;

    public function  __construct(array $reducers)
    {
        $this->reducers = $reducers;
    }

    public function handle(User $user, ResponseInterface $response): User
    {
        return array_reduce($this->reducers, new Pipeline($response), $user);
    }
}
