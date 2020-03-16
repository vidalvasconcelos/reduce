<?php

declare(strict_types=1);

namespace Tests\Domain;

use App\Domain\Phones\PhoneException;
use App\Domain\Phones\Phone;
use PHPUnit\Framework\TestCase;

final class PhoneTest extends TestCase
{
    use PhoneTestUseCases;

    /**
     * @dataProvider invalidFormatNumbers
     * @param string $number
     */
    public function test_disabled_number(string $number): void
    {
        $this->expectException(PhoneException::class);

        new Phone($number, 'land_line', false);
    }
}