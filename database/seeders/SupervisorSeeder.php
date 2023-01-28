<?php

namespace Database\Seeders;

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
            'dd_house_id' => 1,
            'password' => 12345678,
        ]);
        $supervisor1->assignRole('supervisor');
        Supervisor::create([
            'user_id' => $supervisor1->id,
            'pool_number' => '01923909896',
            'joining_date' => '2019-09-01',
        ]);

        // Supervisor 02
        $supervisor2 = User::create([
            'name' => 'Md. Ridoy',
            'username' => 'ridoy',
            'email' => 'ridoy@enstudio.com.bd',
            'role' => 'supervisor',
            'dd_house_id' => 2,
            'password' => 12345678,
        ]);
        $supervisor2->assignRole('supervisor');
        Supervisor::create([
            'user_id' => $supervisor2->id,
            'pool_number' => '01923909897',
            'joining_date' => '2021-03-01',
        ]);

        // Supervisor 03
        $supervisor3 = User::create([
            'name' => 'Mosharof Hossein',
            'username' => 'mosharof',
            'email' => 'mosharof@enstudio.com.bd',
            'role' => 'supervisor',
            'dd_house_id' => 3,
            'password' => 12345678,
        ]);
        $supervisor3->assignRole('supervisor');
        Supervisor::create([
            'user_id' => $supervisor3->id,
            'pool_number' => '01911775550',
            'joining_date' => '2012-07-01',
        ]);
    }
}
