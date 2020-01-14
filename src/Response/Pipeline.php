<?php

declare(strict_types=1);

namespace App\Response;

use App\Response\Reducers\Reducer;
use App\User;
use Psr\Http\Message\ResponseInterface;

final class Pipeline
{
    private ResponseInterface $response;

    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }

    public function __invoke(User $user, Reducer $reducer): User
    {
        return $reducer(
            $user,
            json_decode($this->response->getBody()->getContents(), true)
        );
    }
}
