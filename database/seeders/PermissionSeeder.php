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

        Permission::create(['name' => 'view banners']);
        Permission::create(['name' => 'create banner']);
        Permission::create(['name' => 'delete banners']);
        Permission::create(['name' => 'edit banners']);

        Permission::create(['name' => 'view restaurant categories']);
        Permission::create(['name' => 'create restaurant category']);
        Permission::create(['name' => 'delete restaurant categories']);
        Permission::create(['name' => 'edit restaurant categories']);

        Permission::create(['name' => 'view food categories']);
        Permission::create(['name' => 'create food category']);
        Permission::create(['name' => 'delete food categories']);
        Permission::create(['name' => 'edit food categories']);

        Permission::create(['name' => 'view discount categories']);
        Permission::create(['name' => 'create discount category']);
        Permission::create(['name' => 'delete discount categories']);
        Permission::create(['name' => 'edit discount categories']);

        Permission::create(['name' => 'view comments']);
        Permission::create(['name' => 'create comment']);
        Permission::create(['name' => 'delete comments']);
        Permission::create(['name' => 'edit comments']);

        Permission::create(['name' => 'view foods']);
        Permission::create(['name' => 'create food']);
        Permission::create(['name' => 'delete foods']);
        Permission::create(['name' => 'edit foods']);

        Permission::create(['name' => 'view restaurants']);
        Permission::create(['name' => 'create restaurant']);
        Permission::create(['name' => 'delete restaurants']);
        Permission::create(['name' => 'edit restaurants']);

        Permission::create(['name' => 'view orders']);
        Permission::create(['name' => 'create order']);
        Permission::create(['name' => 'delete orders']);
        Permission::create(['name' => 'edit orders']);

        Permission::create(['name' => 'view food parties']);
        Permission::create(['name' => 'create view food party']);
        Permission::create(['name' => 'delete food parties']);
        Permission::create(['name' => 'edit food parties']);


        foreach (enum::getValues() as $role) {
            $$role = Role::create(['name'=>$role]);
        }
        $admin->givePermissionTo(Permission::all());


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
            'name' => 'فروشنده2',
            'email' => 'test3@gmail.com',
            'password' => Hash::make(123456),
        ]);
        $superAdmin->assignRole($admin);

        $seller1->assignRole($seller);
        $seller2->assignRole($seller);
        $seller3->assignRole($seller);
    }

}
