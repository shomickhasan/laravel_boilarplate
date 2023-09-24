<?php

namespace Database\Seeders;

use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create(['name' => 'admin']);
        $permissions_with_group = [

            'user management' => [
                'add user',
                'edit user',
                'delete user',
            ],
            'activity management' => [
                'show user activity',
            ],
        ];

        foreach ($permissions_with_group as $group_name => $permissions) {
            // Assign permissions to the role and specify the group_name
            foreach ($permissions as $item) {
                Permission::create([
                    'name' => $item,
                    //'guard_name' => 'web', // Replace with your guard name if necessary
                    'group_name' => $group_name,
                ]);
            }

            // You can also assign permissions to the role in bulk
            $role->givePermissionTo($permissions);
        }

        // Assign the role to a user
        $user = User::first();
        $user->assignRole($role);
    }
}
