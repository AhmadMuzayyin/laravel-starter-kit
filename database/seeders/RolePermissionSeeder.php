<?php

namespace Database\Seeders;

use App\RolesEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = new Role();
        $roles = RolesEnum::getRoles();
        foreach ($roles as $roleName) {
            $role->firstOrCreate(['name' => $roleName->value]);
        }
    }
}
