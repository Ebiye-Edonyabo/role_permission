<?php

namespace Database\Seeders;

use App\Models\User;
use App\Enums\UserRoles;
use Illuminate\Support\Str;
use App\Enums\UserPermissions;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'slug' => Str::slug('admin'),
            'email' => 'adminebiye@mail.com',
            'password' => Hash::make('test1234'),
        ])->assignRole(UserRoles::ADMIN->value)->givePermissionTo(UserPermissions::cases());
    }
}
