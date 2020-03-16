<?php

declare(strict_types=1);

namespace App\Response;

use RuntimeException;

final class PipelineException extends RuntimeException
{
    public static function contentMissing(): self
    {
        return new self(
            'content is missing.'
        );
    }

    public static function contentUnprocessable(): self
    {
        return new self(
            'content is unprocessable.'
        );
    }
}