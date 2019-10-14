<?php

declare(strict_types=1);

namespace App\Response;

use App\User;
use Psr\Http\Message\ResponseInterface;

final class Process
{
    /**
     * @var string
     */
    private $response;

    /**
     * Pipeline constructor.
     *
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }

    /**
     * @param User $user
     * @param string    $reducer
     *
     * @return User
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
