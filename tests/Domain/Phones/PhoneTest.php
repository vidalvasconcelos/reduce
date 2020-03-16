<?php

declare(strict_types=1);

namespace Tests\Domain\Phones;

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
    public function test_invalid_format_number(string $number): void
    {
        $this->expectException(PhoneException::class);

        Phone::fromArray([
            'number' => $number,
            'type' => 'land_line',
            'enabled' => false,
        ]);
    }
}