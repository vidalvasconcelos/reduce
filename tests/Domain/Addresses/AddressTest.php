<?php

declare(strict_types=1);

namespace Tests\Domain\Addresses;

use App\Domain\Addresses\Address;
use App\Domain\Addresses\AddressException;
use PHPUnit\Framework\TestCase;

class AddressTest extends TestCase
{
    use AddressTestUseCases;

    /**
     * @test
     * @dataProvider invalidAddresses
     * @param array $address
     */
    public function expect_invalid_address_exception(array $address): void
    {
        $this->expectException(AddressException::class);

        Address::fromArray($address);
    }
}
