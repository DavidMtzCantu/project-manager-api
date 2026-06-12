<?php

declare(strict_types=1);
namespace App\Services;

use App\Models\Project;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;


class ProjectService 
{
    public function getAll(User $user) : LengthAwarePaginator
    {
        return $user->projects()->latest()->paginate(10);
    }

    public function create(User $user, array $data) : Project
    {
        return $user->projects()->create($data);
    }

    public function update(Project $project, array $data):Project
    {
        $project->update($data);
        return $project;
    }

    public function delete(Project $project): void
    {
        $project->delete();
    }
}