<?php

declare(strict_types=1);

namespace Tests\Response\Validators;

use App\Response\Validators\AddressValidator;
use PHPUnit\Framework\TestCase;
use Tests\Response\DataProviders\AddressDataProvider;

class AddressValidatorTest extends TestCase
{
    use AddressDataProvider;

    /**
     * @var \App\Response\Validators\AddressValidator
     */
    private $addressValidator;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->addressValidator = new AddressValidator();
    }

    /**
     * @test            Given FALSE from validator
     *                  When NO HAVE ANY attribute in address
     *
     * @return  void
     */
    public function assertFalseWhenAddressNotContainsAnyAttribute(): void
    {
        self::assertFalse(
            $this->addressValidator->__invoke(
                []
            )
        );
    }

    /**
     * @test            Given False from validator
     *                  When disabled attribute is TRUE
     *
     * @return  void
     */
    public function assertFalseWhenDisabledAttributeFromAddressesIsTrue(): void
    {
        self::assertFalse(
            $this->addressValidator->__invoke([
                'current'   => false,
                'disabled'  => true,
                'street'    => 'rua jackson',
                'number'    => 254,
                'zip_code'  => '23345-300',
                'city'      => 'Vancouver',
            ])
        );
    }

    /**
     * @depends             assertFalseWhenDisabledAttributeFromAddressesIsTrue
     * @dataProvider        invalidZipCodeFormat
     * @test                Given FALSE from validator
     *                      When zip_code attributes isn't valid
     *
     * @param   string      $zipCode
     * @return  void
     */
    public function assertFalseWhenAddressContainsSomeInvalidZipCodeFormat(string $zipCode): void
    {
        self::assertFalse(
            $this->addressValidator->__invoke([
                'current'   => false,
                'disabled'  => false,
                'street'    => 'rua jackson',
                'number'    => 254,
                'zip_code'  => $zipCode,
                'city'      => 'Vancouver',
            ])
        );
    }
}
