<?php

namespace App\Http\Controllers;

use App\Services\TaskPlanner;

class TaskController extends Controller
{
    protected $planner;

    public function __construct(TaskPlanner $planner)
    {
        $this->planner = $planner;
    }

    /**
     * Ana sayfada görev planlamasını göster.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $plan = $this->planner->planTasks();
        $totalWeeks = $this->planner->calculateTotalWeeks();

        return view('tasks.index', compact('plan', 'totalWeeks'));
    }
}
