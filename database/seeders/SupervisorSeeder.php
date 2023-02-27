<?php

namespace Database\Seeders;

use App\Models\DdHouse;
use App\Models\Supervisor;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupervisorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Supervisor 01
        $supervisor1 = User::create([
            'name' => 'Titu Mia',
            'username' => 'titumia',
            'email' => 'titu@enstudio.com.bd',
            'role' => 'supervisor',
            'dd_house_id' => 'MYMVAI01',
            'password' => 12345678,
        ]);
        Supervisor::create([
            'dd_house_id' => 'MYMVAI01',
            'user_id' => $supervisor1->id,
            'pool_number' => '1923909896',
            'joining_date' => '2019-09-01',
        ]);

        // Supervisor 02
        $supervisor2 = User::create([
            'name' => 'Md. Ridoy',
            'username' => 'ridoy',
            'email' => 'ridoy@enstudio.com.bd',
            'role' => 'supervisor',
            'dd_house_id' => 'MYMVAI02',
            'password' => 12345678,
        ]);
        Supervisor::create([
            'dd_house_id' => 'MYMVAI02',
            'user_id' => $supervisor2->id,
            'pool_number' => '1923909897',
            'joining_date' => '2021-03-01',
        ]);

        // Supervisor 03
        $supervisor3 = User::create([
            'name' => 'Ruhul Amin',
            'username' => 'ruhul.amin',
            'email' => 'ruhul.amin@enstudio.com.bd',
            'role' => 'supervisor',
            'dd_house_id' => 'MYMVAI03',
            'password' => 12345678,
        ]);
        Supervisor::create([
            'dd_house_id' => 'MYMVAI03',
            'user_id' => $supervisor3->id,
            'pool_number' => '1923909899',
            'joining_date' => '2012-07-01',
        ]);
    }
}
