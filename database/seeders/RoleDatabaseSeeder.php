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
//        $roles = [
//            ['name' => 'super-admin', 'display_name' => 'Super Admin', 'group' => 'system'],
//            ['name' => 'warden', 'display_name' => 'Warden', 'group' => 'system'],
//            ['name' => 'deputy_warden', 'display_name' => 'Deputy warden', 'group' => 'system'],
//            ['name' => 'team_leader', 'display_name' => 'Team leader', 'group' => 'system'],
//            ['name' => 'officer', 'display_name' => 'Officer', 'group' => 'system'],
//            ['name' => 'soldier', 'display_name' => 'Soldier', 'group' => 'system'],
//        ];
//
//        foreach($roles as $role) {
//            Role::updateOrCreate($role);
//        }

        $permissions = [
            ['name' => 'create-user', 'display_name' => 'Create user', 'group' => 'User'],
            ['name' => 'update-user', 'display_name' => 'Update user', 'group' => 'User'],
            ['name' => 'show-user', 'display_name' => 'Show user', 'group' => 'User'],
            ['name' => 'delete-user', 'display_name' => 'Delete user', 'group' => 'User'],

            ['name' => 'create-role', 'display_name' => 'Create role', 'group' => 'Role'],
            ['name' => 'update-role', 'display_name' => 'Update role', 'group' => 'Role'],
            ['name' => 'show-role', 'display_name' => 'Show role', 'group' => 'Role'],
            ['name' => 'delete-role', 'display_name' => 'Delete role', 'group' => 'Role'],

            ['name' => 'create-unit', 'display_name' => 'Create unit', 'group' => 'Unit'],
            ['name' => 'update-unit', 'display_name' => 'Update unit', 'group' => 'Unit'],
            ['name' => 'show-unit', 'display_name' => 'Show unit', 'group' => 'Unit'],
            ['name' => 'delete-unit', 'display_name' => 'Delete unit', 'group' => 'Unit'],

            ['name' => 'create-rank', 'display_name' => 'Create rank', 'group' => 'Rank'],
            ['name' => 'update-rank', 'display_name' => 'Update rank', 'group' => 'Rank'],
            ['name' => 'show-rank', 'display_name' => 'Show rank', 'group' => 'Rank'],
            ['name' => 'delete-rank', 'display_name' => 'Delete rank', 'group' => 'Rank'],

            ['name' => 'create-position', 'display_name' => 'Create position', 'group' => 'Position'],
            ['name' => 'update-position', 'display_name' => 'Update position', 'group' => 'Position'],
            ['name' => 'show-position', 'display_name' => 'Show position', 'group' => 'Position'],
            ['name' => 'delete-position', 'display_name' => 'Delete position', 'group' => 'Position'],

            ['name' => 'create-salary-cfts', 'display_name' => 'Create SalaryCft', 'group' => 'SalaryCft'],
            ['name' => 'update-salary-cfts', 'display_name' => 'Update SalaryCft', 'group' => 'SalaryCft'],
            ['name' => 'show-salary-cfts', 'display_name' => 'Show SalaryCft', 'group' => 'SalaryCft'],
            ['name' => 'delete-salary-cfts', 'display_name' => 'Delete SalaryCft', 'group' => 'SalaryCft'],
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate($permission);
        }
    }
}
