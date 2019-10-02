<?php

declare(strict_types=1);

namespace App\Response;

use App\Response\Reducers\AddressesReducer;
use App\Response\Reducers\PhonesReducer;
use App\Response\Reducers\Reducer;
use App\User;
use Psr\Http\Message\ResponseInterface;

final class Handler
{
    /**
     * @var \App\User
     */
    private $user;

    private $reducers = [
        PhonesReducer::class,
        AddressesReducer::class,
    ];

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function handle(ResponseInterface $response): User
    {
        return array_reduce($this->reducers, function (User $user, Reducer $reducer) use ($response) {
            return $reducer($user, $response->getBody());
        }, $this->user);
    }
}
