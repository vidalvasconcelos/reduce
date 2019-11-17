<?php

declare(strict_types=1);

namespace Tests\Response\Validators;

use App\Response\Validators\PhoneValidator;
use PHPUnit\Framework\TestCase;
use Tests\Response\DataProviders\PhoneDataProvider;

class PhoneValidatorTest extends TestCase
{
    use PhoneDataProvider;

    /**
     * @var \App\Response\Validators\PhoneValidator
     */
    private $phoneValidator;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->phoneValidator = new PhoneValidator();
    }

    /**
     * @test            Given FALSE from validator
     *                  When disabled attributes is TRUE
     *
     * @return  void
     */
    public function assertFalseWhenAddressContainsNotContainsAnyAttribute(): void
    {
        self::assertFalse(
            $this->phoneValidator->__invoke(
                []
            )
        );
    }

    /**
     * @test            Given FALSE from validator
     *                  When active attribute is FALSE
     *
     * @return  void
     */
    public function assertFalseWhenPhoneIsNotActive(): void
    {
        self::assertFalse(
            $this->phoneValidator->__invoke([
                'active'    => false,
                'number'    => '+55 (88) 99614-3274',
                'type'      => 'cellphone',
            ])
        );
    }

    /**
     * @depends         assertFalseWhenPhoneIsNotActive
     * @dataProvider    invalidFormatNumbers
     * @test            Given FALSE from validator
     *                  When number attribute has a invalid format
     *
     *
     * @param   string  $phoneNumber
     * @return  void
     */
    public function assertFalseWhenPhoneNotContainsAValidFormat(string $phoneNumber): void
    {
        self::assertFalse(
            $this->phoneValidator->__invoke([
                'active'    => true,
                'number'    => $phoneNumber,
                'type'      => 'cellphone',
            ])
        );
    }

    /**
     * @depends         assertFalseWhenPhoneIsNotActive
     * @dataProvider    invalidPhoneTypes
     * @test            Given FALSE from validator
     *                  When type attribute not exist
     *                  in [LANDLINE, CELLPHONE]
     *
     *
     * @param   string  $phoneType
     * @return  void
     */
    public function assertFalseWhenPhoneNotContainsAnAvailableType(string $phoneType): void
    {
        self::assertFalse(
            $this->phoneValidator->__invoke([
                'active' => true,
                'number' => '+55 (88) 99614-3274',
                'type' => $phoneType,
            ])
        );
    }
}
