<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Accountant 01
        $accountant1 = User::create([
            'name' => 'Titu',
            'username' => 'titu_account',
            'email' => 'titu_account@enstudio.com.bd',
            'role' => 'accountant',
            'password' => 12345678,
        ]);
        $accountant1->assignRole('accountant');
    }
}
