<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Database\Eloquent\Model;

/**
 * Handles the whole Policy with one function
 */
abstract class AbstractSimplePolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @return Response|bool
     */
    public function viewAny(User $user): Response|bool
    {
        return $this->hasPermission($user);
    }

    abstract function hasPermission(User $user, ?Model $model = null): Response|bool;

    /**
     * @param User $user
     * @param Model $model
     * @return Response|bool
     */
    public function view(User $user, Model $model): Response|bool
    {
        return $this->hasPermission($user, $model);
    }

    /**
     * @param User $user
     * @return Response|bool
     */
    public function create(User $user): Response|bool
    {
        return $this->hasPermission($user);
    }

    /**
     * @param User $user
     * @param Model $model
     * @return Response|bool
     */
    public function update(User $user, Model $model): Response|bool
    {
        return $this->hasPermission($user, $model);
    }

    /**
     * @param User $user
     * @param Model $model
     * @return Response|bool
     */
    public function delete(User $user, Model $model): Response|bool
    {
        return $this->hasPermission($user, $model);
    }

    /**
     * @param User $user
     * @param Model $model
     * @return Response|bool
     */
    public function restore(User $user, Model $model): Response|bool
    {
        return $this->hasPermission($user, $model);
    }

    /**
     * @param User $user
     * @param Model $model
     * @return Response|bool
     */
    public function forceDelete(User $user, Model $model): Response|bool
    {
        return $this->hasPermission($user, $model);
    }
}
