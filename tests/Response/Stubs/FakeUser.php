<?php

declare(strict_types=1);

namespace Tests\Response\Stubs;

use App\User;

final class FakeUser implements User
{
    /**
     * This property simulate a user collection in Storage
     *
     * @var array
     */
    private $attributes = [
        'id' => '383hif343ig39439h93uh',
        'name' => 'Robson Silva',
        'phones' => [
            [
                'type' => 'cellphone',
                'phone_number' => '+55 (11) 12345-4567',
            ]
        ],
        'addresses' => [
            [
                'current' => false,
                'street' => 'rua jackson',
                'number' => 254,
                'zip_code' => '23345-300',
                'city' => 'Vancouver',
            ],
            [
                'current' => true,
                'street' => 'rua rey charles',
                'number' => 254,
                'zip_code' => '2457s2-300',
                'city' => 'Rotterdam',
            ],
        ],
        'dependents' => [
            [
                'id' => '9038uf893fh99329nc23k5',
            ],
        ],
    ];

    /**
     * {@inheritDoc}
     */
    public function embed(string $field, array $attributes): User
    {
        $this->attributes[$field] = $attributes;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function toAttributes(): array
    {
        return $this->attributes;
    }
}
