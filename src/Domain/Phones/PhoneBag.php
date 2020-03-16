<?php

declare(strict_types=1);

namespace App\Domain\Phones;

use App\Domain\User;

interface PhoneBag
{
    public function getPhones(): array;

    public function setPhone(Phone $phone): User;
}
