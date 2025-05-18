<?php

namespace Database\Seeders;

use App\Models\UserProfile;
use Illuminate\Database\Seeder;

class UserProfileSeeder extends Seeder
{
    public function run(): void
    {
        UserProfile::create([
            'user_id' => 1, // Super Admin
            'photo' => 'profiles/superadmin.jpg',
            'bio' => 'Saya adalah Super Admin KostCook.',
            'phone' => '081111111111',
            'address' => 'Jl. Merdeka No.1',
        ]);

        UserProfile::create([
            'user_id' => 2, // Admin
            'photo' => 'profiles/admin.jpg',
            'bio' => 'Admin aktif KostCook.',
            'phone' => '082222222222',
            'address' => 'Jl. Kemerdekaan No.2',
        ]);

        UserProfile::create([
            'user_id' => 3, // Regular User
            'photo' => 'profiles/user.jpg',
            'bio' => 'Saya suka masak hemat!',
            'phone' => '083333333333',
            'address' => 'Jl. Kost Hemat No.3',
        ]);
    }
}
