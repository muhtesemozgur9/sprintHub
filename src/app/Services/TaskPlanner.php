<?php

namespace App\Services;

use App\Data\MockDataDto;
use App\Entities\Task;
use App\Repositories\TaskRepositoryInterface;
use Mockery\Mock;

class TaskPlanner
{
    protected $developers = [
        ['name' => 'DEV1', 'capacity' => 1, 'hours' => 45, 'assigned_tasks' => []],
        ['name' => 'DEV2', 'capacity' => 2, 'hours' => 45, 'assigned_tasks' => []],
        ['name' => 'DEV3', 'capacity' => 3, 'hours' => 45, 'assigned_tasks' => []],
        ['name' => 'DEV4', 'capacity' => 4, 'hours' => 45, 'assigned_tasks' => []],
        ['name' => 'DEV5', 'capacity' => 5, 'hours' => 45, 'assigned_tasks' => []],
    ];

    protected $tasks;
    protected TaskRepositoryInterface $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
        $this->tasks = $this->taskRepository->getAll();
    }

    /**
     * Görevleri geliştiricilere dağıtır ve planlamayı döndürür.
     *
     * @return array
     */
    public function planTasks(): array
    {
        foreach ($this->tasks as $task) {
            $this->assignTaskToDeveloper($task);
        }

        return $this->developers;
    }

    /**
     * Görevi en uygun geliştiriciye atar.
     *
     * @param MockDataDto $task
     */
    protected function assignTaskToDeveloper(MockDataDto $task): void
    {
        foreach ($this->developers as &$developer) {
            if ($developer['capacity'] >= $task->difficulty && $developer['hours'] >= $task->duration) {

                $developer['assigned_tasks'][] = $task;
                $developer['hours'] -= $task->duration;

                return;
            }
        }

        $highestCapacityDeveloper = &$this->developers[count($this->developers) - 1];
        if ($highestCapacityDeveloper['hours'] >= $task->duration) {
            $highestCapacityDeveloper['assigned_tasks'][] = $task;
            $highestCapacityDeveloper['hours'] -= $task->duration;
        }
    }


    /**
     * Toplam kaç hafta gerektiğini hesaplar.
     *
     * @return int
     */
    public function calculateTotalWeeks(): int
    {
        $totalHours = array_reduce($this->tasks->toArray(), function ($carry, MockDataDto $task) {
            return $carry + $task->duration;
        }, 0);

        $developerTotalCapacityPerWeek = array_sum(array_column($this->developers, 'capacity')) * 45;
        return ceil($totalHours / $developerTotalCapacityPerWeek);
    }
}
