<?php

namespace App\Response\Adapters;

use App\Response\Transformers\Transformer;
use App\Response\Validators\Validator;
use Faker\Provider\Uuid;
use PHPUnit\Framework\TestCase;

final class AddressesAdapterTest extends TestCase
{
    /**
     * @var \App\Response\Transformers\Transformer|\PHPUnit\Framework\MockObject\MockObject
     */
    private $transformer;

    /**
     * @var \App\Response\Validators\Validator|\PHPUnit\Framework\MockObject\MockObject
     */
    private $validator;

    /**
     * @var \App\Response\Adapters\AddressesAdapter
     */
    private $addressesAdapter;

    /**
     * {@inheritDoc}
     */
    public function setUp(): void
    {
        $this->transformer = $this->createMock(Transformer::class);
        $this->validator = $this->createMock(Validator::class);

        $this->addressesAdapter = new AddressesAdapter(
            $this->transformer,
            $this->validator
        );
    }

    /**
     * @test    When addresses is passed to function
     *          when id field should be removed from
     *          content.
     *
     * @return void
     */
    public function removeAddressWhenAddressHaveDisabled(): void
    {
        $address = [
            'current'   => false,
            'street'    => 'rua jackson',
            'number'    => 254,
            'zip_code'  => '23345-300',
            'city'      => '0001',
        ];

        $this->validator
            ->expects($this->any())
            ->method('__invoke')
            ->with($address)
            ->will($this->returnValue(true));

        $this->transformer
            ->expects($this->any())
            ->method('__invoke')
            ->with($address)
            ->will($this->returnValue([]));

        $addresses = $this->addressesAdapter->__invoke(
            [],
            $address
        );

        $this->assertSame(
            [$address['id'] => $address],
            $addresses
        );
    }
}
