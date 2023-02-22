<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manager = User::create([
            'name' => 'Khasruzzaman Khasru',
            'username' => 'khasruzzaman',
            'email' => 'khasruzzaman@enstudio.com.bd',
            'role' => 'manager',
            'password' => 12345678,
        ]);
    }
}
