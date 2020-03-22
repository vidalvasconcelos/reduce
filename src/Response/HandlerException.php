<?php

declare(strict_types=1);

namespace App\Response;

use RuntimeException;

final class HandlerException extends RuntimeException
{
    public static function contentMissing(): self
    {
        return new self(
            'Content is missing.'
        );
    }

    public static function contentEmpty(): self
    {
        return new self(
            'Content is empty.'
        );
    }
}