<?php

declare(strict_types=1);

namespace App\Response\Adapters;

use App\Response\Transformers\Transformer;
use App\Validation\Validator;
use function array_reduce;

final class AddressesAdapter implements Adapter
{
    private Transformer $transformer;

    private array $validators;

    public function __construct(Transformer $transformer, array $validators)
    {
        $this->transformer = $transformer;
        $this->validators = $validators;
    }

    public function __invoke(array $data, array $current): array
    {
        return array_reduce($this->validators, function (array $data, Validator $validator) use ($data): array {
            if ($validator($data)) {
                return array_replace_recursive($data, ($this->transformer)($data));
            }

            return $data;
        });
    }
}
