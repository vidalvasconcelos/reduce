<?php

declare(strict_types=1);

namespace App\Domain\Phones;

interface PhoneBag
{
    public function getPhones(): array;

    public function setPhone(Phone $phone): self;
}
