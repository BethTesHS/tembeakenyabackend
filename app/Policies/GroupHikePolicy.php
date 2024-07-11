<?php

namespace App\Policies;

use App\Models\GroupHike;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class GroupHikePolicy
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
    public function view(User $user, GroupHike $groupHike): bool
    {
        return $user->groups->contains($groupHike->group_id);
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
    public function update(User $user, GroupHike $groupHike): bool
    {
        return $user->role_id === 3 || $user->id === $groupHike->guide_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, GroupHike $groupHike): bool
    {
        return $user->role_id === 3 || $user->id === $groupHike->guide_id;
    }

    // /**
    //  * Determine whether the user can restore the model.
    //  */
    // public function restore(User $user, GroupHike $groupHike): bool
    // {
    //     //
    // }

    // /**
    //  * Determine whether the user can permanently delete the model.
    //  */
    // public function forceDelete(User $user, GroupHike $groupHike): bool
    // {
    //     //
    // }
}
