<?php

namespace App\Services\Status;

use App\Models\Status;
use App\DataTransferObject\Status\StoreDTO;

class StoreService
{
    public function __construct(protected StoreDTO $dto)
    {
    }

    public function execute(): Status
    {
        return Status::create([
            'name' => $this->dto->name,
            'description' => $this->dto->description,
            'order' => $this->setOrder(),
        ]);
    }

    protected function setOrder(): int
    {
        return Status::max('order') + 1;
    }
}
