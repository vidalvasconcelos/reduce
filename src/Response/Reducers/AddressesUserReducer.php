<?php

declare(strict_types=1);

namespace App\Response\Reducers;

use App\User;

final class AddressesUserReducer implements UserReducer
{
    /**
     * This string filtering the specific part
     * of attributes that be extracted.
     *
     * @const string
     */
    public const FILTER_ATTRIBUTE = 'addresses';

    /**
     * {@inheritDoc}
     */
    public function __invoke(User $user, array $attribute): User
    {
        return $user->embed(
            self::FILTER_ATTRIBUTE,
            array_filter($attribute[self::FILTER_ATTRIBUTE], function ($address) {
                return ! $address['disabled'];
            })
        );
    }
}
