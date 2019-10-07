<?php

declare(strict_types=1);

namespace Tests\Response\Factories;

use Mockery;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

final class ResponseFactory
{
    public static function buildFromArray(array $attributes): ResponseInterface
    {
        $response = Mockery::mock(ResponseInterface::class);
        $stream = Mockery::mock(StreamInterface::class);

        $response
            ->expects('getBody')
            ->once()
            ->andReturns($stream);

        $stream
            ->expects('getContents')
            ->once()
            ->andReturns(json_encode($attributes, JSON_FORCE_OBJECT));

        return $response;
    }
}
