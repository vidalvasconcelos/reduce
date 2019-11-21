<?php

namespace App\Response\Adapters;

use App\Response\Transformers\Transformer;
use App\Response\Validators\Validator;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Tests\Response\DataProviders\AddressDataProvider;

final class AddressesAdapterTest extends TestCase
{
    use AddressDataProvider;

    /**
     * @var MockObject|Transformer
     */
    private $transformer;

    /**
     * @var MockObject|Validator
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
     * @dataProvider    disabledAddresses
     * @test            When addresses is passed to function
     *                  when id field should be removed from
     *                  content.
     *
     * @param   array   $address
     * @return  void
     */
    public function removeAddressWhenAddressHaveDisabled(array $address): void
    {
        $this
            ->validator
            ->method('__invoke')
            ->with($address)
            ->willReturn(true);

        $this
            ->transformer
            ->method('__invoke')
            ->with($address)
            ->willReturn([]);

        $addresses = $this->addressesAdapter->__invoke(
            [],
            $address
        );

        $this->assertSame([$address], $addresses);
    }
}
