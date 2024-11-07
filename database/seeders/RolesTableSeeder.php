<?php

namespace Database\Seeders;

use App\Enums\Role as RoleEnum;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['id' => RoleEnum::ADMIN->value, 'name' => RoleEnum::ADMIN->name(), 'slug' => RoleEnum::ADMIN->slug()]);
        Role::create(['id' => RoleEnum::REGULAR->value, 'name' => RoleEnum::REGULAR->name(), 'slug' => RoleEnum::REGULAR->slug()]);
    }
}
