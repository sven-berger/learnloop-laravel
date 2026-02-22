<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Seed roles and permissions.
     */
    public function run(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        $commentPermission = Permission::firstOrCreate(['name' => 'comment']);
        $moderatePermission = Permission::firstOrCreate(['name' => 'moderate comments']);
        $createPermission = Permission::firstOrCreate(['name' => 'create content']);

        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $moderatorRole = Role::firstOrCreate(['name' => 'moderator']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        $adminRole->syncPermissions([$commentPermission, $moderatePermission, $createPermission]);
        $moderatorRole->syncPermissions([$commentPermission, $moderatePermission]);
        $userRole->syncPermissions([$commentPermission]);

        $admin = User::query()->find(1);
        if ($admin) {
            $admin->syncRoles([$adminRole]);
        }

        $normalUser = User::query()->find(2);
        if ($normalUser) {
            $normalUser->syncRoles([$userRole]);
        }

        app(PermissionRegistrar::class)->forgetCachedPermissions();
    }
}
