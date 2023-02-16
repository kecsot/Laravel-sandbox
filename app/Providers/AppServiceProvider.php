<?php

namespace App\Providers;

use App\Models\Role;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // TODO: (move?)
        $roles = Role::with('permissions')->get();

        $permissionsWithRoleArray = [];
        foreach ($roles as $role) {
            foreach ($role->permissions as $item) {
                $permissionKey = $item->permission;
                $permissionsWithRoleArray[$permissionKey][] = $role->id;
            }
        }

        foreach ($permissionsWithRoleArray as $name => $allowedForRoles) {
            Gate::define($name, function ($user) use ($allowedForRoles) {
                $userRoles = $user->roles->pluck('id')->toArray();
                return !empty(array_intersect($userRoles, $allowedForRoles));
            });
        }
    }
}
