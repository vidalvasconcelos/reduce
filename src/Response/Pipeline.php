<?php

declare(strict_types=1);

namespace App\Response;

use App\Response\Reducers\Reducer;
use App\Domain\User;
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
        $content = $this->response->getBody()->getContents();
        $attributes = json_decode($content, true, 512, JSON_THROW_ON_ERROR);

        return $reducer($user, $attributes);
    }
}
