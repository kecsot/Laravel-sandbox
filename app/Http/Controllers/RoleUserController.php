<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RoleUserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Role::class);
        //$this->authorizeResource(User::class);
    }

    public function create(Role $role): View
    {
        $users = User::whereDoesntHave('roles', function ($subQuery) use ($role) {
            return $subQuery->where('roles.id', $role->id);
        })->get();

        return view('roles.users.create', compact('role', 'users'));
    }

    public function store(StoreRoleUserRequest $request, Role $role): RedirectResponse
    {
        $uid = $request->get('uid');
        $user = User::find($uid);
        $success = $role->users()->save($user);
        if (!$success) {
            return redirect()->back()->withErrors(__('Store failed!'));
        }

        return redirect()->route('roles.show', $role);
    }

    public function destroy(Role $role, User $user): RedirectResponse
    {
        $success = $role->users()->detach($user);
        if (!$success) {
            return redirect()->back()->withErrors(__('Delete failed!'));
        }

        return redirect()->route('roles.show', $role);
    }

}
