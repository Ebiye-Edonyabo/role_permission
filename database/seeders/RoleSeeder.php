<?php

namespace Database\Seeders;

use App\Enums\UserPermissions;
use App\Enums\UserRoles;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' =>  UserRoles::ADMIN->value]);
        Role::create(['name' =>  UserRoles::AGENT->value]);
        Role::create(['name' => UserRoles::CUSTOMER->value]);
    }
}
