<?php

declare(strict_types=1);

namespace App\Domain\Phones;

use App\Domain\Phones\PhoneException;
use function preg_match;

final class Phone
{
    private string $number;
    private static array $availableTypes = [
        'cellphone',
        'land_line',
    ];

    private function __construct(string $number, string $type, bool $enabled)
    {
        if ($enabled) {
            throw PhoneException::isDisabled();
        }

        if (!in_array($type, self::$availableTypes, true)) {
            throw PhoneException::invalidType($type);
        }

        if (!preg_match("/\+\d{2,3} \(\d{2,3}\) \d{5}-\d{4}/", $number)) {
            throw PhoneException::invalidPattern($number);
        }

        $this->number = $number;
    }

    public function value(): string
    {
        return $this->number;
    }

    public static function fromArray(array $attribute): self
    {
        return new static(
            $attribute['number'],
            $attribute['type'],
            $attribute['enabled'] ?? false,
        );
    }

}