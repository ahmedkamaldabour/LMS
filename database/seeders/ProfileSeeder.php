<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::first();
        Profile::create([
            'phone' => '0123456789',
            'image' => 'null',
            'admin_id' => $admin->id
        ]);
    }
}
