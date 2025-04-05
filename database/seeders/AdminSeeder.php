<?php

namespace Database\Seeders;

use App\Enums\UserPermissions;
use App\Enums\UserRoles;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'adminebiye@mail.com',
            'password' => Hash::make('test1234'),
        ])->assignRole(UserRoles::ADMIN->value)->givePermissionTo(UserPermissions::cases());
    }
}
