<?php

declare(strict_types=1);

namespace Tests\Response;

use App\Response\User;

final class FakeUser implements User
{
    private array $collection = [];

    /**
     * {@inheritDoc}
     */
    public function embed(string $field, array $attributes): User
    {
        $this->collection[$field] = $attributes;

        return $this;
    }
}
