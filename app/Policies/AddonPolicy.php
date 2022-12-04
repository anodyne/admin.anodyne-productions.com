<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Addon;
use App\Models\User;
use App\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class AddonPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        if (in_array($user->role, [Role::ADMIN, Role::STAFF])) {
            return true;
        }
    }

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Addon $addon): bool
    {
        return $addon->user->is($user);
    }

    public function create(User $user): bool
    {
        return $user->is_exchange_author;
    }

    public function update(User $user, Addon $addon): bool
    {
        return $addon->user->is($user);
    }

    public function delete(User $user, Addon $addon): bool
    {
        return $addon->user->is($user);
    }

    public function restore(User $user, Addon $addon): bool
    {
        return $addon->user->is($user);
    }

    public function forceDelete(User $user, Addon $addon): bool
    {
        return $addon->user->is($user);
    }
}
