<?php

namespace App\Policies;

use App\Models\Questions;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuestionsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Questions  $questions
     * @return mixed
     */
    public function view(User $user, Questions $questions)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Questions  $questions
     * @return mixed
     */
    public function update(User $user, Questions $questions)
    {
        return $user->id == $questions->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Questions  $questions
     * @return mixed
     */
    public function delete(User $user, Questions $questions)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Questions  $questions
     * @return mixed
     */
    public function restore(User $user, Questions $questions)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Questions  $questions
     * @return mixed
     */
    public function forceDelete(User $user, Questions $questions)
    {
        //
    }
}
