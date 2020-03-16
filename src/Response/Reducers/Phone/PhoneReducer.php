<?php

declare(strict_types=1);

namespace App\Response\Reducers\Phone;

use App\Domain\Phones\Phone;
use App\Domain\Phones\PhoneBag;
use App\Domain\User;
use App\Response\Reducers\Reducer;

final class PhoneReducer implements Reducer
{
    public function __invoke(PhoneBag $bag, array $attributes): User
    {
        return $bag->setPhone(
            Phone::fromArray($attributes)
        );
    }
}
