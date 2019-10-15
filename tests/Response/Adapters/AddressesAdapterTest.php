<?php

declare(strict_types=1);

namespace App\Response\Adapters;

use Faker\Provider\Uuid;
use PHPUnit\Framework\TestCase;

final class AddressesAdapterTest extends TestCase
{
    /**
     * @test    When addresses is passed to function
     *          the id field should be removed from
     *          content.
     *
     * @return void
     */
    public function should_remove_id_field_from_address(): void
    {
        $addressesId = Uuid::uuid();

        $address = [
            'current'   => false,
            'street'    => 'rua jackson',
            'number'    => 254,
            'zip_code'  => '23345-300',
            'city'      => 'NJ',
            'disabled'  => false,
        ];

        $adapter    = new AddressesAdapter();
        $addresses  = $adapter->__invoke([], $address + ['id' => $addressesId]);

        $this->assertSame(
            [$addressesId => $address],
            $addresses
        );
    }
}
