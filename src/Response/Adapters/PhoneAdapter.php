<?php

declare(strict_types=1);

namespace App\Response\Adapters;

use App\Response\Address;
use App\Response\Transformers\AddressTransformer;
use App\Response\Transformers\PhoneTransformer;
use App\Response\Transformers\Transformer;
use App\User;

final class PhoneAdapter implements Adapter
{
    /**
     * @var \App\Response\Transformers\PhoneTransformer
     */
    private $transformer;

    /**
     * PhoneAdapter constructor.
     *
     * @param \App\Response\Transformers\PhoneTransformer $transformer
     */
    public function __construct(PhoneTransformer $transformer)
    {
        $this->transformer = $transformer;
    }

    /**
     * @param array $data
     * @param array $current
     *
     * @return array
     */
    public function __invoke(array $data, array $current): array
    {
        $transform = new PhoneTransformer();

        $data[Address::ID] = $transform($current);

        return $data;
    }
}
