<?php

declare(strict_types=1);

namespace App\Response\Reducers\Phone;

use App\Domain\User;
use App\Response\Reducers\Address\AddressReducerException;
use App\Response\Reducers\Address\PhoneReducerException;
use App\Response\Reducers\Reducer;
use App\Response\Schema;
use function array_reduce;

final class PhoneBagReducer implements Reducer
{
    public function __invoke(User $user, array $attributes): User
    {
        if (! array_key_exists(Schema::PHONES_BAG, $attributes)) {
            throw PhoneReducerException::isRequired();
        }

        if ($phones = $attributes[Schema::PHONES_BAG]) {
            return $user;
        }

        return array_reduce($phones, new PhoneReducer(), $user);
    }
}
