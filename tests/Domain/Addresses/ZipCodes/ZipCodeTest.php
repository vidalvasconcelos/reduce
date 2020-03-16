<?php

declare(strict_types=1);

namespace Tests\Domain;

use App\Domain\Addresses\ZipCodes\ZipCodeException;
use App\Domain\Addresses\ZipCodes\ZipCode;
use PHPUnit\Framework\TestCase;

final class ZipCodeTest extends TestCase
{
    use ZipCodeTestUseCases;

    /**
     * @dataProvider invalidZipCodeFormat
     * @param string $zipCode
     */
    public function test_invalid_zip_code_exception(string $zipCode): void
    {
        $this->expectException(ZipCodeException::class);

        new ZipCode($zipCode);
    }

    /**
     * @dataProvider validZipCodeFormat
     * @param string $zipCode
     */
    public function test_zip_code_value_assertion(string $zipCode): void
    {
        $entity = new ZipCode($zipCode);

        $this->assertSame(
            $zipCode,
            $entity->value()
        );
    }
}
