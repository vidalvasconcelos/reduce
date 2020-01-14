<?php

declare(strict_types=1);

namespace App\Response\Reducers;

use ArrayAccess;
use Exception;

final class ReducerBag implements ArrayAccess
{
    private array $reducers = [];

    public function __construct(array $reducers)
    {
        $this->reducers = $reducers;
    }

    public function offsetExists($offset): bool
    {
        return (bool) ($this->reducers[$offset] ?? false);
    }

    public function offsetGet($offset): Reducer
    {
        if (!$this->offsetExists($offset)) {
            throw new Exception('This reducer isn`t setup.');
        }

        return new ($this->reducers[$offset]);
    }

    public function offsetSet($offset, $value)
    {
        throw new Exception('Illegal operation to reducers');
    }

    public function offsetUnset($offset)
    {
        throw new Exception('Illegal operation to reducers');
    }
}