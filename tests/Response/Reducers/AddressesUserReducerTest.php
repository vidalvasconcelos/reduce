<?php

namespace Tests\Response\Reducers;

use App\Response\Reducers\AddressesUserReducer;
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

        $commonAddress = [
            'current'   => false,
            'street'    => 'rua jackson',
            'number'    => 254,
            'zip_code'  => '23345-300',
            'city'      => 'Vancouver',
        ];

        $fakeUser->embed('addresses', [$commonAddress]);

        $reducer->__invoke($fakeUser, [
            'addresses' => [ $commonAddress + ['disabled'  => true]],
        ]);

        $this->assertEmpty(
            $fakeUser->attributes()[$reducer::FILTER_ATTRIBUTE]
        );
    }
}
