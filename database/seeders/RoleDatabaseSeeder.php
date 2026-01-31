<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'super-admin', 'display_name' => 'Super Admin', 'group' => 'system'],
            ['name' => 'warden', 'display_name' => 'Warden', 'group' => 'system'],
            ['name' => 'deputy_warden', 'display_name' => 'Deputy warden', 'group' => 'system'],
            ['name' => 'team_leader', 'display_name' => 'Team leader', 'group' => 'system'],
            ['name' => 'officer', 'display_name' => 'Officer', 'group' => 'system'],
            ['name' => 'soldier', 'display_name' => 'Soldier', 'group' => 'system'],
        ];

        foreach($roles as $role) {
            Role::updateOrCreate($role);
        }

        $permissions = [
            ['name' => 'create-user', 'display_name' => 'Create user', 'group' => 'User'],
            ['name' => 'update-user', 'display_name' => 'Update user', 'group' => 'User'],
            ['name' => 'show-user', 'display_name' => 'Show user', 'group' => 'User'],
            ['name' => 'delete-user', 'display_name' => 'Delete user', 'group' => 'User'],

            ['name' => 'create-role', 'display_name' => 'Create role', 'group' => 'Role'],
            ['name' => 'update-role', 'display_name' => 'Update role', 'group' => 'Role'],
            ['name' => 'show-role', 'display_name' => 'Show role', 'group' => 'Role'],
            ['name' => 'delete-role', 'display_name' => 'Delete role', 'group' => 'Role'],
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate($permission);
        }
    }
}
