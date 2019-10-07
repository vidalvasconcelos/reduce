<?php

declare(strict_types=1);

namespace App\Response\Reducers;

use App\User;
use Psr\Http\Message\StreamInterface;

/**
 * Class PhonesReducer
 *
 * When Api response has some number that user persisted
 * don't have, you need
 *
 * @package App\Response\Reducers
 * @test Test\Response\
 */
final class PhonesReducer implements Reducer
{
    public function __invoke(User $user, StreamInterface $data): User
    {
        return $user;
    }
}
