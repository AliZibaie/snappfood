<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\Enums\Role as enum;

class PermissionSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        Permission::create(['name' => 'accept admin']);
        Permission::create(['name' => 'add food category']);
        Permission::create(['name' => 'delete food category']);
        Permission::create(['name' => 'add restaurant category']);
        Permission::create(['name' => 'delete restaurant category']);
        Permission::create(['name' => 'delete seller']);
        Permission::create(['name' => 'define coupon']);
        Permission::create(['name' => 'add coupon']);
        Permission::create(['name' => 'define banner']);
        Permission::create(['name' => 'add banner']);
        Permission::create(['name' => 'view user']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'view sellers']);
        Permission::create(['name' => 'add restaurant']);
        Permission::create(['name' => 'define food']);
        foreach (enum::getValues() as $role) {
            $$role = Role::create(['name'=>$role]);
        }
        $admin->givePermissionTo(Permission::all());
        $seller->givePermissionTo('add coupon');
        $seller->givePermissionTo('add banner');
        $seller->givePermissionTo('add restaurant');
        $seller->givePermissionTo('define food');
        $user = User::factory()->create([
            'name' => 'Example User',
            'email' => 'test@example.com',
            'password' => Hash::make(123456),
        ]);
        $user->assignRole($admin);
    }

}
