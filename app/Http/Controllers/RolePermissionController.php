<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRolePermissionRequest;
use App\Models\Role;
use App\Models\RolePermission;
use App\Permissions\Permissions;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class RolePermissionController extends Controller
{
    public function __construct()
    {
        //$this->authorizeResource(RolePermission::class);
    }

    public function create(Role $role): View
    {
        $rolePermissions = $role->permissions()->pluck('permission')->toArray();
        $allPermission = Permissions::cases();

        $permissions = [];
        foreach ($allPermission as $permission) {
            if (!in_array($permission->getName(), $rolePermissions)) {
                $permissions[$permission->getName()] = $permission->name;
            }
        }

        return view('roles.permissions.create', compact('role', 'permissions'));
    }

    public function store(StoreRolePermissionRequest $request, Role $role): RedirectResponse
    {
        $rolePermission = new RolePermission([
            'role_id' => $role->id,
            'permission' => $request->get('permission')
        ]);
        $success = $rolePermission->save();
        if (!$success) {
            return redirect()->back()->withErrors(__('Store failed!'));
        }

        return redirect()->route('roles.show', $role);
    }


    /**
     * @param Role $role
     * @param RolePermission $permission
     * @return RedirectResponse
     */
    public function destroy(Role $role, RolePermission $permission): RedirectResponse
    {
        $success = $permission->delete();
        if (!$success) {
            return redirect()->back()->withErrors(__('Delete failed!'));
        }

        return redirect()->route('roles.show', $role);
    }

}
