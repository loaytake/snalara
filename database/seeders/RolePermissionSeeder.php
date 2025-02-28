<?php

namespace Database\Seeders;

use App\Enums\PermissionsEnum;
use App\Enums\RolesEnum;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        $UserRole = Role::create(['name' => RolesEnum::USER->value]);
        $CommenterRole = Role::create(['name' => RolesEnum::COMMENTER->value]);
        $AdminRole = Role::create(['name' => RolesEnum::ADMIN->value]);
        $ManageFeaturesPermission = Permission::create(['name' => PermissionsEnum::MANAGEFEATURES->value]);
        $ManageUsersPermission = Permission::create(['name' => PermissionsEnum::MANAGEUSERS->value]);
        $ManageCommentsPermission = Permission::create(['name' => PermissionsEnum::MANAGECOMMENTS->value]);
        $UpvoteDownvotePermission = Permission::create(['name' => PermissionsEnum::UPVOTEDOWNVOTE->value]);
        $UserRole->syncPermissions([$UpvoteDownvotePermission]);
        $CommenterRole->syncPermissions([$UpvoteDownvotePermission, $ManageCommentsPermission]);
        $AdminRole->syncPermissions([$ManageFeaturesPermission, $ManageUsersPermission, $ManageCommentsPermission, $UpvoteDownvotePermission]);

        User::factory()
            ->count(10)
            ->create()->each(function ($user) {
                $user->assignRole(RolesEnum::USER);
            });

        User::factory()
            ->count(6)
            ->create()->each(function ($user) {
                $user->assignRole(RolesEnum::COMMENTER);
            });
        User::factory()
            ->count(2)
            ->create()->each(function ($user) {
                $user->assignRole(RolesEnum::ADMIN);
            });

    }
}
