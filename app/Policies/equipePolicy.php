<?php

namespace App\Policies;

use App\Models\domaine;
use App\Models\User;
use App\Models\equipe;
use Illuminate\Auth\Access\Response;

class equipePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;

    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, equipe $equipe): bool
    {
        return $user->typeUser=='Prof_Admin';
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->typeUser=='Prof_Admin';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, equipe $equipe): bool
    {
        return $user->typeUser=='Prof_Admin';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, equipe $equipe): bool
    {
        return $user->typeUser=='Prof_Admin';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, equipe $equipe): bool
    {
        return $user->typeUser=='Prof_Admin';
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, equipe $equipe): bool
    {
        return $user->typeUser=='Prof_Admin';
    }
}
