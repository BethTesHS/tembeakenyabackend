<?php

namespace App\Policies;

use App\Models\Hike;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class HikePolicy
{
    // /**
    //  * Determine whether the user can view any models.
    //  */
    // public function viewAny(User $user): bool
    // {
    //     //
    // }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Hike $hike): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role_id === 2 || $user->role_id === 3; // Guides and Super Admins
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Hike $hike): bool
    {
        return $user->role_id === 3 || $user->id === $hike->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Hike $hike): bool
    {
        return $user->role_id === 3 || $user->id === $hike->user_id;
    }

    // /**
    //  * Determine whether the user can restore the model.
    //  */
    // public function restore(User $user, Hike $hike): bool
    // {
    //     //
    // }

    // /**
    //  * Determine whether the user can permanently delete the model.
    //  */
    // public function forceDelete(User $user, Hike $hike): bool
    // {
    //     //
    // }
}
