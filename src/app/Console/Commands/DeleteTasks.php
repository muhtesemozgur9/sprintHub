<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Entities\Task; // Task modelini ekliyoruz

class DeleteTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tasks:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Tasks tablosundaki tüm verileri siler';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        Task::truncate();

        $this->info('Tasks tablosundaki tüm veriler başarıyla silindi.');
    }
}
