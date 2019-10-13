<?php

declare(strict_types=1);

namespace App\Response\Reducers;

use App\PhonesBag;
use App\Response\Validators\PhoneValidator;
use App\User;

final class PhonesUserReducer implements UserReducer
{
    /**
     * {@inheritDoc}
     */
    public function __invoke(User $user, array $attribute): User
    {
        return $user->embed(PhonesBag::PHONES_FIELD, array_filter(
            $attribute[PhonesBag::PHONES_FIELD],
            new PhoneValidator()
        ));
    }
}
