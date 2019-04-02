<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Project;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Project $project)
    {
        return $user->id == $project->user_id;
    }


    public function create(User $user)
    {
        //
    }


    public function update(User $user, Project $project)
    {
        return $user->id == $project->user_id;
    }


    public function delete(User $user, Project $project)
    {
        return $user->id == $project->user_id;
    }


    public function restore(User $user, Project $project)
    {
        //
    }


    public function forceDelete(User $user, Project $project)
    {
        //
    }
}
