<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ZmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $zm = User::create([
            'name' => 'Supan Kanti Roy',
            'username' => 'supan',
            'email' => 'supan@enstudio.com.bd',
            'role' => 'zm',
            'password' => 12345678,
        ]);
        $zm->assignRole('zm');
    }
}
