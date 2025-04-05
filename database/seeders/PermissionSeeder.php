<?php

namespace Database\Seeders;

use App\Enums\UserPermissions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => UserPermissions::UPLOAD->value]);
        Permission::create(['name' => UserPermissions::DELETE->value]);
    }
}
