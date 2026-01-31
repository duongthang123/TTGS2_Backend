<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssignRandomRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = Role::all();
        User::whereDoesntHave('roles')->each(function ($user) use ($roles) {
            $user->assignRole($roles->random());
        });
    }
}
