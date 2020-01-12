<?php

declare(strict_types=1);

namespace App\Response\Adapters;

use App\Response\Address;
use App\Response\Transformers\PhoneTransformer;
use App\Response\Transformers\Transformer;

final class PhoneAdapter implements Adapter
{
    private Transformer $transformer;

    public function __construct(PhoneTransformer $transformer)
    {
        $this->transformer = $transformer;
    }

    public function __invoke(array $data, array $current): array
    {
        $transform = new PhoneTransformer();

        $data[Address::ID] = $transform($current);

        return $data;
    }
}
