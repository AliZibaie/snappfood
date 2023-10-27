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
        $superAdmin = User::factory()->create([
            'name' => 'علی زیبایی',
            'email' => 'alizibaie1380@gmail.com',
            'password' => Hash::make(123456),
        ]);
        $seller1 =  User::factory()->create([
            'name' => 'فروشنده 1',
            'email' => 'test@gmail.com',
            'password' => Hash::make(123456),
        ]);
        $seller2 =  User::factory()->create([
            'name' => 'فروشنده2',
            'email' => 'test2@gmail.com',
            'password' => Hash::make(123456),
        ]);
        $seller3 =  User::factory()->create([
            'name' => '3',
            'email' => 'test3@gmail.com',
            'password' => Hash::make(123456),
        ]);
        $superAdmin->assignRole($admin);

        $seller1->assignRole($seller);
        $seller2->assignRole($seller);
        $seller3->assignRole($seller);
    }

}
