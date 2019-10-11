<?php

declare(strict_types=1);

namespace App\Response;

use App\User;
use Psr\Http\Message\ResponseInterface;

final class Pipeline
{
    /**
     * @var string
     */
    private $response;

    /**
     * Pipeline constructor.
     *
     * @param \Psr\Http\Message\ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }

    /**
     * @param \App\User $user
     * @param string    $reducer
     *
     * @return \App\User
     */
    public function __invoke(User $user, string $reducer): User
    {
        return (new $reducer)(
            $user,
            json_decode($this->getResponseContents(), true)
        );
    }

    /**
     * @return string
     */
    private function getResponseContents(): string
    {
        return $this->response->getBody()->getContents();
    }
}
