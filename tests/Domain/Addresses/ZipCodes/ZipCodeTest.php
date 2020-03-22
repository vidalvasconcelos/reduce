<?php

declare(strict_types=1);

namespace Tests\Domain\Addresses\ZipCodes;

use App\Domain\Addresses\ZipCodes\ZipCodeException;
use App\Domain\Addresses\ZipCodes\ZipCode;
use PHPUnit\Framework\TestCase;

final class ZipCodeTest extends TestCase
{
    use ZipCodeTestUseCases;

    /**
     * @test
     * @dataProvider invalidZipCodeFormat
     * @param string $zipCode
     */
    public function expect_invalid_zip_code_exception(string $zipCode): void
    {
        $this->expectException(ZipCodeException::class);

        new ZipCode($zipCode);
    }

    /**
     * @test
     * @dataProvider validZipCodeFormat
     * @param string $zipCode
     */
    public function assert_zip_code_value(string $zipCode): void
    {
        $entity = new ZipCode($zipCode);

        $this->assertSame(
            $zipCode,
            $entity->value()
        );
    }
}
