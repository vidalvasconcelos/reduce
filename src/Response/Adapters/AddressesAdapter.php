<?php

declare(strict_types=1);

namespace App\Response\Adapters;

use App\Response\Address;
use App\Response\Transformers\AddressTransformer;
use App\Response\Transformers\Transformer;
use App\Response\Validators\Validator;
use App\User;

final class AddressesAdapter implements Adapter
{
    /**
     * @var \App\Response\Transformers\Transformer
     */
    private $transformer;

    /**
     * @var \App\Response\Validators\Validator
     */
    private $validator;

    public function __construct(Transformer $transformer, Validator $validator)
    {
        $this->transformer = $transformer;
        $this->validator = $validator;
    }

    /**
     * @param array $data
     * @param array $current
     *
     * @return array
     */
    public function __invoke(array $data, array $current): array
    {
        if (($this->validator)($current)) {
            $data[Address::ID] = ($this->transformer)($current);
        }

        return $data;
    }
}
