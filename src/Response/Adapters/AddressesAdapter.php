<?php

declare(strict_types=1);

namespace App\Response\Adapters;

use App\Response\Transformers\Transformer;
use App\Response\Validators\Validator;

final class AddressesAdapter implements Adapter
{
    private Transformer $transformer;

    private Validator $validator;

    public function __construct(Transformer $transformer, Validator $validator)
    {
        $this->transformer = $transformer;
        $this->validator = $validator;
    }

    public function __invoke(array $data, array $current): array
    {
        if (($this->validator)($current)) {
            array_replace_recursive($data, ($this->transformer)($current));
        }

        return $data;
    }
}
