<?php

namespace App\Repositories;

use App\Data\MockDataDto;
use Illuminate\Database\Eloquent\Collection;

interface TaskRepositoryInterface
{
    public function add(MockDataDto $data): ?int;
    public function getAll(): Collection;
}
