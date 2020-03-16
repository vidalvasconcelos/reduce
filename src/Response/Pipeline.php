<?php

declare(strict_types=1);

namespace App\Response;

use App\Domain\User;
use Psr\Http\Message\ResponseInterface;

final class Pipeline
{
    private ResponseInterface $response;

    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }

    public function __invoke(User $user, callable $reducer): User
    {
        if (!$content = $this->response->getBody()->getContents()) {
            throw PipelineException::contentMissing();
        }

        if (!$data = json_decode($content, true, 512, JSON_THROW_ON_ERROR)) {
            throw PipelineException::contentUnprocessable();
        }

        return $reducer(clone $user, $data);
    }
}
