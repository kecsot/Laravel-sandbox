<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'email' => 'admin@admin.hu',
            'name' => 'admin',
            'password' => Hash::make('X!FmCuJsi5kxH!$')
        ]);
        User::factory(5)->create();
    }
}
