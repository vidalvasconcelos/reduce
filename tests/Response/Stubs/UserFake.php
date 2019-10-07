<?php

declare(strict_types=1);

namespace Tests\Response\Stubs;

use App\User;

final class UserFake implements User
{
    public function fill(array $attributes): array
    {
        return [];
    }

    public function toAttributes(): array
    {
        return [
            'user_id' => '383hif343ig39439h93uh',
            'first_name' => 'Robson',
            'surname' => 'Silva',
            'support_degree' => 'u3',
            'phones' => [
                [
                    'active' => true,
                    'type' => 'cellphone',
                    'phone_number' => '+55 (26) 12345-4567',
                ],
                [
                    'active' => false,
                    'type' => 'cellphone',
                    'phone_number' => '+55 (35) 98765-1243',
                ],
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
                    'active' => true,
                    'id' => '9038uf893fh99329nc23k5',
                ],
                [
                    'active' => false,
                    'id' => '78y43h93gh975h46v89psb',
                ],
            ],
        ];
    }
}
