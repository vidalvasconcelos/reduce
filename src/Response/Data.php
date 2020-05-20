<?php

declare(strict_types=1);

namespace App\Response;

use Psr\Http\Message\ResponseInterface;
use const JSON_THROW_ON_ERROR;
use function json_decode;

final class Data
{
    private array $attributes;

    public function __construct(ResponseInterface $response)
    {
        if (!$content = $response->getBody()->getContents()) {
            throw DataException::contentMissing();
        }

        if (!$attributes = json_decode($content, true, 512, JSON_THROW_ON_ERROR)) {
            throw DataException::contentEmpty();
        }

        $this->attributes = $attributes;
    }

    public function toArray(): array
    {
        return $this->attributes;
    }
}