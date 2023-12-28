<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorShopProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email' , 'vendor@gmail.com')->first();

        $vendor = new Vendor();

        $vendor->banner = 'Test.jpg';
        $vendor->shop_name = 'Vendor Shop';
        $vendor->phone = '132456';
        $vendor->email = 'vendor@gmail.com';
        $vendor->address = 'USA';
        $vendor->description = 'anywhere in the world';
        $vendor->user_id = $user->id;
        $vendor->save();
    }
}
