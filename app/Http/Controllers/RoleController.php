<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Role;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Role::class);
    }

    public function index(): View
    {
        $roles = Role::query()
            ->latest()
            ->get();

        return view('roles.index', compact('roles'));
    }

    public function create(): View
    {
        return view('roles.create');
    }

    public function store(StoreRoleRequest $request): RedirectResponse
    {
        $role = new Role([
            'name' => $request->get('name')
        ]);

        $success = $role->save();
        if (!$success) {
            return redirect()->back()->withErrors(__('Store failed!'));
        }

        return redirect()->route('roles.index');
    }

    public function show(Role $role): View
    {
        return view('roles.show', compact('role'));
    }

    public function edit(Role $role): View
    {
        return view('roles.edit', compact('role'));
    }

    public function update(UpdateRoleRequest $request, Role $role): RedirectResponse
    {
        $role->name = $request->get('name');
        $success = $role->save();
        if (!$success) {
            return redirect()->back()->withErrors(__('Update failed!'));
        }

        return redirect()->route('roles.index');
    }

    public function destroy(Role $role): RedirectResponse
    {
        $success = $role->delete();
        if (!$success) {
            return redirect()->back()->withErrors(__('Delete failed!'));
        }

        return redirect()->route('roles.index');
    }
}
