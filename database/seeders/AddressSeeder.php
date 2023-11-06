<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Address::factory(20)->create([
             'title'=>'بلبل',
             'address'=>'loasfoiaslkdmlsdmosdnvosdjklv',
             'longitude'=>43.21,
             'latitude'=>56.23,
             'addressable_type'=>'App\Models\User',
             'addressable_id'=>1,
         ]);
    }
}
