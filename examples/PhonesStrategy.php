<?php

declare(strict_types=1);

use App\Response\Strategy;
use App\Response\User;

final class PhonesStrategy implements Strategy
{
    public function schema(): string
    {
        return 'phones';
    }

    public function __invoke(User $user, array $attributes): User
    {
        if (!isset($attributes[$this->schema()])) {
            return $user;
        }

        return array_reduce($attributes[$this->schema()], static function (User $user, array $phone): User {
            return $user->embed($this->schema(), $phone);
        }, $user);
    }
}
