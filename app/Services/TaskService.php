<?php

declare(strict_types=1);
namespace App\Services;

use App\Models\Project;
use App\Models\User;
use App\Models\Task;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;


class TaskService {

    public function getAll(Project $project): Collection 
    {
        return $project->tasks()->latest()->get();
    }

    public function create(Project $project, array $data): Task
    {
        return $project->tasks()->create($data);
    }

    public function update(Task $task, array $data): Task
    {
        $task->update($data);
        return $task;
    }

    public function delete(Task $task):void
    {
        $task->delete();
    }

}