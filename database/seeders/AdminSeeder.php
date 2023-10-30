<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            [
                'name' => 'Super Admin',
                'email' => 'super_admin@email.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@email.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Manager',
                'email' => 'manager@email.com',
                'password' => bcrypt('password'),
            ],
        ];

        $roles = [
            [
                'name' => 'Super Admin',
                'guard_name' => 'admin',
            ],
            [
                'name' => 'Admin',
                'guard_name' => 'admin',
            ],
            [
                'name' => 'Manager',
                'guard_name' => 'admin',
            ],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }

        foreach ($admins as $user) {
            $new_user = Admin::create($user);
            if ($new_user->id == 1) {
                $new_user->assignRole('Super Admin');
            } elseif ($new_user->id == 2) {
                $new_user->assignRole('Admin');
            } else {
                $new_user->assignRole('Manager');
            }
        }
    }
}
