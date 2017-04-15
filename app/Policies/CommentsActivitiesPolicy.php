<?php

namespace App\Policies;

use App\User;
use App\CommentsActivities;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentsActivitiesPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the commentsActivities.
     *
     * @param  \App\User  $user
     * @param  \App\CommentsActivities  $commentsActivities
     * @return mixed
     */
    public function view(User $user, CommentsActivities $commentsActivities)
    {
        return true;
    }

    /**
     * Determine whether the user can create commentsActivities.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the commentsActivities.
     *
     * @param  \App\User  $user
     * @param  \App\CommentsActivities  $commentsActivities
     * @return mixed
     */
    public function update(User $user, CommentsActivities $commentsActivities)
    {
        return $user->id === $commentsActivities->user_id OR $user->isCesi();
    }

    /**
     * Determine whether the user can delete the commentsActivities.
     *
     * @param  \App\User  $user
     * @param  \App\CommentsActivities  $commentsActivities
     * @return mixed
     */
    public function delete(User $user, CommentsActivities $commentsActivities)
    {
        return $user->id === $commentsActivities->user_id OR $user->isCesi();
    }
}
