<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminUserCreateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Emil Sadekin Islam',
            'username' => 'neelemil',
            'email' => 'nilemil007@gmail.com',
            'role' => 'super-admin',
            'password' => 32133213,
        ]);
    }
}
