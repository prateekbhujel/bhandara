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
        $user                  = User::where('email', 'admin@email.com')->first();
        $vendor                = new Vendor();
        $vendor->banner        = 'uplaods/vendorImages/image123.png';
        $vendor->phone         = '+97798625112';
        $vendor->email         = 'testvendor@email.com';
        $vendor->address       = 'np';
        $vendor->description   = 'shop descrtiption';
        $vendor->user_id       = $user->id;

        $vendor->save();
    }
}
