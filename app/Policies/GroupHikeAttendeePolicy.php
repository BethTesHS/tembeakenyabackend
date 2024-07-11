<?php

namespace App\Policies;

use App\Models\GroupHikeAttendee;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class GroupHikeAttendeePolicy
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
    public function view(User $user, GroupHikeAttendee $groupHikeAttendee): bool
    {
        return $user->role_id === 3 || $user->id === $groupHikeAttendee->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role_id === 1; // Hikers
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, GroupHikeAttendee $groupHikeAttendee): bool
    {
        return $user->role_id === 3 || $user->id === $groupHikeAttendee->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, GroupHikeAttendee $groupHikeAttendee): bool
    {
        return $user->role_id === 3 || $user->id === $groupHikeAttendee->user_id;
    }

    // /**
    //  * Determine whether the user can restore the model.
    //  */
    // public function restore(User $user, GroupHikeAttendee $groupHikeAttendee): bool
    // {
    //     //
    // }

    // /**
    //  * Determine whether the user can permanently delete the model.
    //  */
    // public function forceDelete(User $user, GroupHikeAttendee $groupHikeAttendee): bool
    // {
    //     //
    // }
}
