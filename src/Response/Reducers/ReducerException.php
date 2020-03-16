<?php

declare(strict_types=1);

namespace App\Response\Reducers;

use LogicException;

final class ReducerException extends LogicException
{
    public static function unprocessable(): self
    {
        return new static(
            'This class is incompatible with reducer interface.'
        );
    }
}