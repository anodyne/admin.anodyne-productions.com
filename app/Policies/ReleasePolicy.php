<?php

namespace App\Policies;

use App\Models\Release;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReleasePolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        if ($user->isAdmin) {
            return $this->allow();
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->isStaff
            ? $this->allow()
            : $this->denyAsNotFound();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Release  $release
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Release $release)
    {
        return $user->isStaff
            ? $this->allow()
            : $this->denyAsNotFound();
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $this->denyAsNotFound();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Release  $release
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Release $release)
    {
        return $this->denyAsNotFound();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Release  $release
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Release $release)
    {
        return $this->denyAsNotFound();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Release  $release
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Release $release)
    {
        return $this->denyAsNotFound();
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Release  $release
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Release $release)
    {
        return $this->denyAsNotFound();
    }
}