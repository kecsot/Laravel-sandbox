<?php

namespace App\Policies;

use App\Models\User;
use App\Permissions\Permissions;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Database\Eloquent\Model;

class RolePolicy extends AbstractSimplePolicy
{
    use HandlesAuthorization;

    public function hasPermission(User $user, ?Model $model = null): Response|bool
    {
        dump("rp");
        return $user->can(Permissions::CAN_ADMINISTRATE_ROLES->getName());
    }

}
