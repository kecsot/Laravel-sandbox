<?php

namespace Database\Seeders;


use App\Models\Role;
use App\Models\RolePermission;
use App\Models\User;
use App\Permissions\Permissions;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $r = Role::find(1);

        /** @var User $u */
        $u = User::find(1);
        $u->roles()->save($r);

        $permissionCases = Permissions::cases();
        foreach ($permissionCases as $permission){
            RolePermission::factory()->create([
                'role_id' => 1,
                'permission' => $permission->getName()
            ]);
        }
    }
}
