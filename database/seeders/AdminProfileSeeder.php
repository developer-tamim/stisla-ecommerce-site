<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email' , 'admin@gmail.com')->first();

        $vendor = new Vendor();

        $vendor->banner = 'Test.jpg';
        $vendor->shop_name = 'Admin Shop';
        $vendor->phone = '132456';
        $vendor->email = 'admin@gmail.com';
        $vendor->address = 'USA';
        $vendor->description = 'anywhere in the world';
        $vendor->user_id = $user->id;
        $vendor->save();
    }
}
