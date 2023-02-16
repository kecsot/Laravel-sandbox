<?php

namespace App\Policies;

use App\Models\User;
use App\Permissions\Permissions;
use Illuminate\Auth\Access\Response;
use Illuminate\Database\Eloquent\Model;

class RolePermissionPolicy extends AbstractSimplePolicy
{

    public function hasPermission(User $user, ?Model $model = null): Response|bool
    {
        return $user->can(Permissions::CAN_ADMINISTRATE_ROLE_PERMISSIONS->getName());
    }

}
