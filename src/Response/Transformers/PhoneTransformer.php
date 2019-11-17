<?php

declare(strict_types=1);

namespace App\Response\Transformers;

use App\PhonesBag;
use App\Response\Phone;

final class PhoneTransformer implements Transformer
{
    public function __invoke(array $current): array
    {
        return [
            PhonesBag::PHONE_CURRENT    => $current[Phone::CURRENT],
            PhonesBag::PHONE_NUMBER     => $current[Phone::NUMBER],
            PhonesBag::TYPE             => $current[Phone::TYPE],
        ];
    }
}
