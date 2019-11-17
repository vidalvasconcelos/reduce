<?php

declare(strict_types=1);

namespace Tests\Response\Reducers;

use App\AddressesBag;
use App\Response\Reducers\AddressesReducer;
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
    public function removeAddressWhenIsDisabledOnResponse(): void
    {
        $fakeUser   = new FakeUser();
        $reducer    = new AddressesReducer();

        $addressId = Uuid::uuid();

        $address = [
            'current'   => false,
            'street'    => 'rua jackson',
            'number'    => 254,
            'zip_code'  => '23345-300',
            'city'      => 'Vancouver',
        ];

        $fakeUser->embed(AddressesBag::ADDRESS_BAG, [
            $addressId => $address
        ]);

        $user = $reducer->__invoke($fakeUser, [
            AddressesBag::ADDRESS_BAG => [
                $address + [
                    'id' => $addressId,
                    'disabled' => true,
                ],
            ],
        ]);

        $this->assertEmpty($user->getAddresses());
    }

    /**
     * @test    Append a new addresses on user
     *          addresses bag.
     *
     * @return  void
     */
    public function appendNewAddressesOnUserCollection(): void
    {
        $fakeUser   = new FakeUser();
        $reducer    = new AddressesReducer();

        $addressId = Uuid::uuid();

        $address = [
            'current'   => false,
            'street'    => 'rua jackson',
            'number'    => 254,
            'zip_code'  => '23345-300',
            'city'      => 'NJ',
        ];

        $fakeUser->embed('addresses', []);

        $reducer->__invoke($fakeUser, [
            AddressesBag::ADDRESS_BAG => [
                $address + [
                    'id'        => $addressId,
                    'disabled'  => false,
                ],
            ],
        ]);

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
    public function updateAnExistingUserAddressCollection(): void
    {
        $fakeUser   = new FakeUser();
        $reducer    = new AddressesReducer();

        $commonUuid = Uuid::uuid();

        $address_outdated = [
            'current'   => false,
            'street'    => 'Rua Jackson',
            'number'    => 254,
            'zip_code'  => '23345-300',
            'city'      => 'NJ',
        ];

        $address_updated = [
            'current'   => false,
            'street'    => 'Rua Michael Jackson',
            'number'    => 300,
            'zip_code'  => '23345-300',
            'city'      => 'NJ',
        ];

        $fakeUser->embed('addresses', [
            $commonUuid => $address_outdated
        ]);

        $reducer->__invoke($fakeUser, [
            'addresses' => [
                $address_updated + [
                    'id'        => $commonUuid,
                    'disabled'  => false,
                ],
            ],
        ]);

        $this->assertSame(
            [$commonUuid => $address_updated],
            $fakeUser->getAddresses()
        );
    }
}
