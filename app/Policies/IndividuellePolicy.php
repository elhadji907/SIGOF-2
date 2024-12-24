<?php

namespace App\Policies;

use App\Models\Individuelle;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class IndividuellePolicy
{
    /**
     * Determine whether the user can view any models.
     */
   /*  public function viewAny(User $user): bool
    {
        //
    } */

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Individuelle $individuelle): bool
    {
        return $user->id === $individuelle->users_id;
    }

    /**
     * Determine whether the user can create models.
     */
 /*    public function create(User $user): bool
    {
        //
    } */

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Individuelle $individuelle): bool
    {
        return $user->id === $individuelle->users_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Individuelle $individuelle): bool
    {
        return $user->id === $individuelle->users_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
/*     public function restore(User $user, Individuelle $individuelle): bool
    {
        //
    } */

    /**
     * Determine whether the user can permanently delete the model.
     */
   /*  public function forceDelete(User $user, Individuelle $individuelle): bool
    {
        //
    } */
}
