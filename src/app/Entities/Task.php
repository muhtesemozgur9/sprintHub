<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    protected $fillable = ['task_name', 'duration', 'difficulty'];
}
