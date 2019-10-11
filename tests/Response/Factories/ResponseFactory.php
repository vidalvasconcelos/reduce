<?php

declare(strict_types=1);

namespace Tests\Response\Factories;

use Mockery;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

final class ResponseFactory
{
    public static function buildFromFixture(string $fixture): ResponseInterface
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
            ->andReturns(file_get_contents($fixture));

        return $response;
    }
}
