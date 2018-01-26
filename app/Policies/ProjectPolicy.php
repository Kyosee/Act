<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Project;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update(User $currentUser, Project $project){
        return $currentUser->id === $project->uid;
    }

    public function checkUser(User $currentUser, Wechat $wechat){
        return $currentUser->id === $wechat->uid;
    }
}
