<?php

namespace Tests\Response\Reducers;

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

        $address = [
            'id'        => Uuid::uuid(),
            'current'   => false,
            'street'    => 'rua jackson',
            'number'    => 254,
            'zip_code'  => '23345-300',
            'city'      => 'Vancouver',
        ];

        $fakeUser->embed('addresses', [$address]);

        $reducer->__invoke($fakeUser, [
            'addresses' => [ $address + ['disabled'  => true]],
        ]);

        $this->assertEmpty(
            $fakeUser->attributes()[$reducer::FILTER_ATTRIBUTE]
        );
    }

    /**
     * @test    When user has not any address and response
     *          contains a new address.
     *
     * @return  void
     */
    public function append_a_new_address_and_user_collection(): void
    {
        $fakeUser   = new FakeUser();
        $reducer    = new AddressesUserReducer();

        $address_one = [
            'id'        => Uuid::uuid(),
            'current'   => false,
            'street'    => 'rua jackson',
            'number'    => 254,
            'zip_code'  => '23345-300',
            'city'      => 'NJ',
        ];

        $address_two = [
            'id'        => Uuid::uuid(),
            'current'   => true,
            'street'    => 'rua michel',
            'number'    => 345,
            'zip_code'  => '23345-300',
            'city'      => 'NY',
        ];

        $fakeUser->embed('addresses', [$address_one]);

        $reducer->__invoke($fakeUser, [
            'addresses' => [$address_two],
        ]);

        $this->assertSame(
            [$address_one, $address_two],
            $fakeUser->attributes()[$reducer::FILTER_ATTRIBUTE]
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
            'id'        => $commonUuid,
            'current'   => false,
            'street'    => 'Rua Jackson',
            'number'    => 254,
            'zip_code'  => '23345-300',
            'city'      => 'NJ',
        ];

        $address_updated = [
            'id'        => $commonUuid,
            'current'   => false,
            'street'    => 'Rua Michel Jackson',
            'number'    => 300,
            'zip_code'  => '23345-300',
            'city'      => 'NJ',
        ];

        $fakeUser->embed('addresses', [$address_outdated]);

        $reducer->__invoke($fakeUser, [
            'addresses' => [$address_updated],
        ]);

        $userAddresses = $fakeUser->attributes()[
            $reducer::FILTER_ATTRIBUTE
        ];

        $this->assertSame(
            [$address_updated],
            [$userAddresses]
        );
    }
}
