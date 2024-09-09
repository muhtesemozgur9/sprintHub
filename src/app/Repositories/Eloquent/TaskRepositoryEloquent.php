<?php

namespace App\Repositories\Eloquent;

use App\Entities\Task;
use App\Data\MockDataDto;
use App\Repositories\TaskRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class TaskRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class TaskRepositoryEloquent extends BaseRepository implements TaskRepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Task::class;
    }

    /**
     * Yeni bir task ekler veya günceller.
     *
     * @param array $data
     * @return int
     */
    public function add(MockDataDto $data): ?int
    {
        return $this->create($data->toArray())->id;
    }

    public function getAll():Collection
    {
        return new Collection($this->get()->map(function (Task $task) {
            return MockDataDto::fromDb($task->toArray());
        }));
    }

}
