<?php

namespace App\Policies;

use App\Models\Sponsor;
use Domain\Users\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SponsorPolicy
{
    use HandlesAuthorization;

    /**
     * Perform pre-authorization checks.
     *
     * @param  \App\Models\User  $user
     * @param  string  $ability
     * @return void|bool
     */
    public function before(User $user, $ability)
    {
        if ($user->isAdmin) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \Domain\Users\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \Domain\Users\Models\User  $user
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Sponsor $sponsor)
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \Domain\Users\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \Domain\Users\Models\User  $user
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Sponsor $sponsor)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \Domain\Users\Models\User  $user
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Sponsor $sponsor)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \Domain\Users\Models\User  $user
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Sponsor $sponsor)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \Domain\Users\Models\User  $user
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Sponsor $sponsor)
    {
        return false;
    }
}
