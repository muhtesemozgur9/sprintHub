<?php

namespace App\Data;

use Spatie\DataTransferObject\DataTransferObject;

class MockDataDto extends DataTransferObject
{
    public string $task_name;
    public int $duration;
    public int $difficulty;

    public static function fromMockOne(array $data): self
    {
        return new self([
            'task_name' => $data['id'],
            'duration' => $data['value'],
            'difficulty' => $data['estimated_duration'],
        ]);
    }

    public static function fromMockTwo(array $data): self
    {
        return new self([
            'task_name' => $data['id'],
            'duration' => $data['sure'],
            'difficulty' => $data['zorluk'],
        ]);
    }
    public static function fromDb(array $data): self
    {
        return new self([
            'task_name' => $data['task_name'],
            'duration' => $data['duration'],
            'difficulty' => $data['difficulty'],
        ]);
    }
}
