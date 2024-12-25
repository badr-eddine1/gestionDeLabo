<?php

namespace App\Policies;

use App\Models\User;
use App\Models\article;
use App\Models\equipe;
use Illuminate\Auth\Access\Response;

class articlePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user ): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, article $article): bool
    {
        return $user->id==$article->User_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->typeUser=='Prof';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, article $article): bool
    {
        return $user->id==$article->User_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, article $article): bool
    {
        return $user->id==$article->User_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, article $article): bool
    {
        return $user->id==$article->User_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, article $article): bool
    {
        return $user->id==$article->User_id;
    }
}
