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
        $role =Role::create(['name'=>'admin']);

        $permision = [
            'add',
            'edit',
            'delete',
        ];

        foreach ($permision as $item){
            Permission::create(['name'=>$item]);
        }
        $role->syncPermissions($permision);
        $user = User::first();
        $user->assignRole( $role);
    }
}
