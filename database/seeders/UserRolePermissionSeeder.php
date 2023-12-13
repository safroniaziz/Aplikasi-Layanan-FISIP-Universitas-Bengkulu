<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat peran "operator" dan tambahkan ke database
        $roleOperator = Role::create(['name' => 'operator']);
        $roleUser = Role::create(['name' => 'user']);

        $permission = Permission::create(['name'  =>  'dashboard']);

        $permission = Permission::create(['name'  =>  'ruanganPoadcast']);
        $permission = Permission::create(['name'  =>  'ruanganPoadcast.create']);
        $permission = Permission::create(['name'  =>  'ruanganPoadcast.store']);
        $permission = Permission::create(['name'  =>  'ruanganPoadcast.edit']);
        $permission = Permission::create(['name'  =>  'ruanganPoadcast.update']);
        $permission = Permission::create(['name'  =>  'ruanganPoadcast.delete']);

        $user = User::create([
            'name' => 'Operator',
            'username' => 'operator',
            'email' => 'operator@mail.com',
            'password' => Hash::make('password'),
        ]);

        $user->assignRole($roleOperator);
    }
}
