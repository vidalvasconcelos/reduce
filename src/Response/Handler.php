<?php

declare(strict_types=1);

namespace App\Response;

use App\Response\Reducers\AddressesReducer;
use App\Response\Reducers\PhonesReducer;
use App\User;
use Psr\Http\Message\ResponseInterface;

final class Handler
{
    /**
     * @var User
     */
    private $user;

    /**
     * Array with Reducers are be applied
     *
     * @var array
     */
    private $reducers = [
        PhonesReducer::class,
        AddressesReducer::class,
    ];

    /**
     * Handler constructor.
     *
     * @param User $user
     */
    public function  __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @param ResponseInterface $response
     *
     * @return User
     */
    public function handle(ResponseInterface $response): User
    {
        return array_reduce($this->reducers, new Pipeline($response), $this->user);
    }
}
