<?php

namespace App\Policies;

use App\User;
use App\CommentsPhotos;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentsPhotosPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the commentsPhotos.
     *
     * @param  \App\User  $user
     * @param  \App\CommentsPhotos  $commentsPhotos
     * @return mixed
     */
    public function view(User $user, CommentsPhotos $commentsPhotos)
    {
        return true;
    }

    /**
     * Determine whether the user can create commentsPhotos.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the commentsPhotos.
     *
     * @param  \App\User  $user
     * @param  \App\CommentsPhotos  $commentsPhotos
     * @return mixed
     */
    public function update(User $user, CommentsPhotos $commentsPhotos)
    {
        return $user->id === $commentsPhotos->user_id OR $user->isCesi();
    }

    /**
     * Determine whether the user can delete the commentsPhotos.
     *
     * @param  \App\User  $user
     * @param  \App\CommentsPhotos  $commentsPhotos
     * @return mixed
     */
    public function delete(User $user, CommentsPhotos $commentsPhotos)
    {
        return $user->id === $commentsPhotos->user_id OR $user->isCesi();
    }
}
