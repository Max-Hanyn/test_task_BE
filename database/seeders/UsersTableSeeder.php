<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Enums\Role as RoleEnum;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $adminRole = Role::firstOrCreate(['id' => RoleEnum::ADMIN->value], ['name' => RoleEnum::ADMIN->name(), 'slug' => RoleEnum::ADMIN->slug()]);
        $regularRole = Role::firstOrCreate(['id' => RoleEnum::REGULAR->value], ['name' => RoleEnum::REGULAR->name(), 'slug' => RoleEnum::REGULAR->slug()]);

        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role_id' => $adminRole->id,
        ]);

        User::create([
            'name' => 'Regular User 1',
            'email' => 'user1@example.com',
            'password' => Hash::make('password'),
            'role_id' => $regularRole->id,
        ]);

        User::create([
            'name' => 'Regular User 2',
            'email' => 'user2@example.com',
            'password' => Hash::make('password'),
            'role_id' => $regularRole->id,
        ]);
    }
}

