<?php

declare(strict_types=1);

namespace Tests\Response\Reducers;

use App\AddressesBag;
use App\Response\Reducers\AddressesUserReducer;
use Faker\Provider\Uuid;
use PHPUnit\Framework\TestCase;
use Tests\Response\Stubs\FakeUser;

class AddressesUserReducerTest extends TestCase
{
    /**
     * @test    When user has a disabled address on response
     *          this address should be removed from user
     *          collection.
     *
     * @return  void
     */
    public function remove_address_when_is_disabled_on_response(): void
    {
        $fakeUser   = new FakeUser();
        $reducer    = new AddressesUserReducer();

        $addressId = Uuid::uuid();

        $address = [
            'current'   => false,
            'street'    => 'rua jackson',
            'number'    => 254,
            'zip_code'  => '23345-300',
            'city'      => 'Vancouver',
            'disabled'  => false,
        ];

        $fakeUser->embed(AddressesBag::ADDRESSES_FIELD, [
            $addressId => $address
        ]);

        $reducer->__invoke($fakeUser, [
            'addresses' => [
                 ['id' => $addressId, 'disabled' => true] + $address
            ],
        ]);

        $this->assertEmpty($fakeUser->getAddresses());
    }

    /**
     * @test    Append a new addresses on user
     *          addresses bag.
     *
     * @return  void
     */
    public function append_a_new_address_and_user_collection(): void
    {
        $fakeUser   = new FakeUser();
        $reducer    = new AddressesUserReducer();

        $addressId = Uuid::uuid();

        $address = [
            'current'   => false,
            'street'    => 'rua jackson',
            'number'    => 254,
            'zip_code'  => '23345-300',
            'city'      => 'NJ',
            'disabled'  => false,
        ];

        $response = [
            AddressesBag::ADDRESSES_FIELD => [
                ['id' => $addressId] + $address,
            ],
        ];

        $fakeUser->embed('addresses', []);
        $reducer->__invoke($fakeUser, $response);

        $this->assertSame(
            [
                $addressId => $address,
            ],
            $fakeUser->getAddresses()
        );
    }

    /**
     * @test    When user has not any address and response
     *          contains a new address.
     *
     * @return  void
     */
    public function update_an_existing_user_address_collection(): void
    {
        $fakeUser   = new FakeUser();
        $reducer    = new AddressesUserReducer();

        $commonUuid = Uuid::uuid();

        $address_outdated = [
            'current'   => false,
            'street'    => 'Rua Jackson',
            'number'    => 254,
            'zip_code'  => '23345-300',
            'city'      => 'NJ',
            'disabled'  => false,
        ];

        $address_updated = [
            'current'   => false,
            'street'    => 'Rua Michael Jackson',
            'number'    => 300,
            'zip_code'  => '23345-300',
            'city'      => 'NJ',
            'disabled'  => false,
        ];

        $fakeUser->embed('addresses', [
            $commonUuid => $address_outdated
        ]);

        $reducer->__invoke($fakeUser, [
            'addresses' => [
                ['id' => $commonUuid] + $address_updated,
            ],
        ]);

        $this->assertSame(
            [$commonUuid => $address_updated],
            $fakeUser->getAddresses()
        );
    }
}
