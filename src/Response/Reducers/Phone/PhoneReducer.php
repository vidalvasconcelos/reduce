<?php

declare(strict_types=1);

namespace App\Response\Reducers\Phone;

use App\Domain\Phones\Phone;
use App\Domain\Phones\PhoneBag;

final class PhoneReducer
{
    public function __invoke(PhoneBag $bag, array $attributes): PhoneBag
    {
        return $bag->setPhone(
            Phone::fromArray($attributes)
        );
    }
}
