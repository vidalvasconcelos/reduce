<?php

declare(strict_types=1);

namespace App\Response\Strategies;

use App\Domain\Phones\Phone;
use App\Domain\User;
use App\Domain\Schema;
use function array_reduce;

final class PhonesStrategy implements Strategy
{
    public function schema(): string
    {
        return Schema::PHONES_BAG;
    }

    public function __invoke(User $user, array $attributes): User
    {
        if (!isset($attributes[$this->schema()])) {
            return $user;
        }

        return array_reduce($attributes[$this->schema()], static function (User $user, array $phone): User {
            return $user->setPhone(Phone::fromArray($phone));
        }, clone $user);
    }
}
