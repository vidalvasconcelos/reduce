<?php

declare(strict_types=1);

namespace App\Response;

use Psr\Http\Message\ResponseInterface;

final class Handler
{
    private Data $data;

    public function __construct(ResponseInterface $response)
    {
        $this->data = new Data($response);
    }

    public function __invoke(User $user, Strategy $strategy): User
    {
        return $strategy($user, $this->data->toArray());
    }
}