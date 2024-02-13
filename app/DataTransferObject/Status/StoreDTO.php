<?php

namespace App\DataTransferObject\Status;

use App\Http\Requests\Status\StoreRequest;

class StoreDTO
{
    public function __construct(public string $name, public string $description)
    {
    }

    public static function fromRequest(StoreRequest $request): self
    {
        return new self(
            name: $request->name,
            description: $request->description
        );
    }
}
