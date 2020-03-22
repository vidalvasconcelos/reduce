<?php

declare(strict_types=1);

namespace App\Response;

use App\Domain\User;
use App\Response\Strategies\Strategy;
use Psr\Http\Message\ResponseInterface;

final class Handler
{
    private array $attributes;

    public function __construct(ResponseInterface $response)
    {
        if (!$content = $response->getBody()->getContents()) {
            throw HandlerException::contentMissing();
        }

        if (!$attributes = json_decode($content, true, 512, JSON_THROW_ON_ERROR)) {
            throw HandlerException::contentEmpty();
        }

        $this->attributes = $attributes;
    }

    public function __invoke(User $user, Strategy $strategy): User
    {
        return $strategy($user, $this->attributes);
    }
}