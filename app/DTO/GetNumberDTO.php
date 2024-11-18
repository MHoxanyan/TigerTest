<?php

namespace App\DTO;

use Illuminate\Contracts\Support\Arrayable;

readonly class GetNumberDTO implements Arrayable
{
    public function __construct(
        public string|int $country,
        public string $service,
    ) {
    }

    public function toArray(): array
    {
        return [
            'country' => $this->country,
            'service' => $this->service,
        ];
    }
}
