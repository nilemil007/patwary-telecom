<?php

namespace Database\Seeders;

use App\Models\Bp;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // BP 01
        $bp1 = User::create([
            'name' => 'Faruk Hasan',
            'username' => '1999969197',
            'email' => 'faruk@enstudio.com.bd',
            'role' => 'bp',
            'dd_house_id' => 'MYMVAI01',
            'password' => 12345678,
        ]);
        Bp::create([
            'user_id' => $bp1->id,
            'supervisor_id' => DbTablesId::supervisorId(),
            'dd_house_id' => 'MYMVAI01',
            'stuff_id' => 'REBP-1194',
            'pool_number' => '1999969197',
            'joining_date' => '2019-08-01',
            'bank_name' => 'DBBL Agent Banking',
            'account_number' => '7017510197800',
        ]);

        // BP 02
        $bp2 = User::create([
            'name' => 'Sadekin Islam',
            'username' => '1999092584',
            'email' => 'sadekin@enstudio.com.bd',
            'role' => 'bp',
            'dd_house_id' => 'MYMVAI01',
            'password' => 12345678,
        ]);
        Bp::create([
            'user_id' => $bp2->id,
            'supervisor_id' => DbTablesId::supervisorId(),
            'dd_house_id' => 'MYMVAI01',
            'stuff_id' => 'REBP-1196',
            'joining_date' => '2019-08-01',
            'bank_name' => 'DBBL Agent Banking',
            'account_number' => '7017018598361',
            'pool_number' => '1999092584',
        ]);

        // BP 03
        $bp3 = User::create([
            'name' => 'Nayeem Miah',
            'username' => '1999969193',
            'email' => 'nayeem@enstudio.com.bd',
            'role' => 'bp',
            'dd_house_id' => 'MYMVAI01',
            'password' => 12345678,
        ]);
        Bp::create([
            'user_id' => $bp3->id,
            'supervisor_id' => DbTablesId::supervisorId(),
            'dd_house_id' => 'MYMVAI01',
            'stuff_id' => 'REBP-1197',
            'joining_date' => '2019-08-01',
            'bank_name' => 'DBBL Agent Banking',
            'account_number' => '7017512885377',
            'pool_number' => '1999969193',
        ]);

        // BP 04
        $bp4 = User::create([
            'name' => 'Muhammad Sujon Khan',
            'username' => '1999969196',
            'email' => 'sujon@enstudio.com.bd',
            'role' => 'bp',
            'dd_house_id' => 'MYMVAI01',
            'password' => 12345678,
        ]);
        Bp::create([
            'user_id' => $bp4->id,
            'supervisor_id' => DbTablesId::supervisorId(),
            'dd_house_id' => 'MYMVAI01',
            'stuff_id' => 'REBP-5091',
            'joining_date' => '2020-12-01',
            'bank_name' => 'DBBL Agent Banking',
            'account_number' => '7017515755546',
            'pool_number' => '1999969196',
        ]);

        // BP 05
        $bp5 = User::create([
            'name' => 'Anowar Hossain',
            'username' => '1999968811',
            'email' => 'anowar@enstudio.com.bd',
            'role' => 'bp',
            'dd_house_id' => 'MYMVAI01',
            'password' => 12345678,
        ]);
        Bp::create([
            'user_id' => $bp5->id,
            'supervisor_id' => DbTablesId::supervisorId(),
            'dd_house_id' => 'MYMVAI01',
            'stuff_id' => 'REBP-7651',
            'joining_date' => '2022-02-01',
            'bank_name' => 'DBBL',
            'account_number' => '1731580014038',
            'pool_number' => '1999968811',
        ]);

        // BP 06
        $bp6 = User::create([
            'name' => 'Md. Deloar Hossain',
            'username' => '1999968890',
            'email' => 'deloar@enstudio.com.bd',
            'role' => 'bp',
            'dd_house_id' => 'MYMVAI01',
            'password' => 12345678,
        ]);
        Bp::create([
            'user_id' => $bp6->id,
            'supervisor_id' => DbTablesId::supervisorId(),
            'dd_house_id' => 'MYMVAI01',
            'stuff_id' => 'REBP-7653',
            'joining_date' => '2022-02-01',
            'bank_name' => 'DBBL',
            'account_number' => '1731580014246',
            'pool_number' => '1999968890',
        ]);

        // BP 07
        $bp7 = User::create([
            'name' => 'Md. Sizal Miah',
            'username' => '1999968838',
            'email' => 'sizal@enstudio.com.bd',
            'role' => 'bp',
            'dd_house_id' => 'MYMVAI01',
            'password' => 12345678,
        ]);
        Bp::create([
            'user_id' => $bp7->id,
            'supervisor_id' => DbTablesId::supervisorId(),
            'dd_house_id' => 'MYMVAI01',
            'stuff_id' => 'REBP-8833',
            'joining_date' => '2022-07-01',
            'bank_name' => 'DBBL',
            'account_number' => '1731580014288',
            'pool_number' => '1999968838',
        ]);

        // BP 08
        $bp8 = User::create([
            'name' => 'Monirul Islam Panna',
            'username' => '1999969198',
            'email' => 'panna@enstudio.com.bd',
            'role' => 'bp',
            'dd_house_id' => 'MYMVAI02',
            'password' => 12345678,
        ]);
        Bp::create([
            'user_id' => $bp8->id,
            'supervisor_id' => DbTablesId::supervisorId('MYMVAI02'),
            'dd_house_id' => 'MYMVAI02',
            'stuff_id' => 'REBP-4508',
            'joining_date' => '2020-09-01',
            'bank_name' => 'DBBL Agent Banking',
            'account_number' => '7017516565032',
            'pool_number' => '1999969198',
        ]);

        // BP 09
        $bp9 = User::create([
            'name' => 'Monayam',
            'username' => '1999968844',
            'email' => 'monayam@enstudio.com.bd',
            'role' => 'bp',
            'dd_house_id' => 'MYMVAI02',
            'password' => 12345678,
        ]);
        Bp::create([
            'user_id' => $bp9->id,
            'supervisor_id' => DbTablesId::supervisorId('MYMVAI02'),
            'dd_house_id' => 'MYMVAI02',
            'stuff_id' => 'REBP-7650',
            'joining_date' => '2022-02-01',
            'bank_name' => 'DBBL Agent Banking',
            'account_number' => '7017010642810',
            'pool_number' => '1999968844',
        ]);

        // BP 10
        $bp10 = User::create([
            'name' => 'Maruf Hasan Arnob',
            'username' => '1999968907',
            'email' => 'arnob@enstudio.com.bd',
            'role' => 'bp',
            'dd_house_id' => 'MYMVAI02',
            'password' => 12345678,
        ]);
        Bp::create([
            'user_id' => $bp10->id,
            'supervisor_id' => DbTablesId::supervisorId('MYMVAI02'),
            'dd_house_id' => 'MYMVAI02',
            'stuff_id' => 'REBP-7654',
            'joining_date' => '2022-02-01',
            'bank_name' => 'DBBL Agent Banking',
            'account_number' => '7017323544425',
            'pool_number' => '1999968907',
        ]);

        // BP 11
        $bp11 = User::create([
            'name' => 'Soharaf Miah',
            'username' => '1999968899',
            'email' => 'soharaf@enstudio.com.bd',
            'role' => 'bp',
            'dd_house_id' => 'MYMVAI02',
            'password' => 12345678,
        ]);
        Bp::create([
            'user_id' => $bp11->id,
            'supervisor_id' => DbTablesId::supervisorId('MYMVAI02'),
            'dd_house_id' => 'MYMVAI02',
            'stuff_id' => 'REBP-8068',
            'joining_date' => '2022-04-01',
            'bank_name' => 'DBBL Agent Banking',
            'account_number' => '7017017978356',
            'pool_number' => '1999968899',
        ]);

        // BP 12
        $bp12 = User::create([
            'name' => 'Mamun Miah',
            'username' => '1999969188',
            'email' => 'mamun@enstudio.com.bd',
            'role' => 'bp',
            'dd_house_id' => 'MYMVAI03',
            'password' => 12345678,
        ]);
        Bp::create([
            'user_id' => $bp12->id,
            'supervisor_id' => DbTablesId::supervisorId('MYMVAI03'),
            'dd_house_id' => 'MYMVAI03',
            'stuff_id' => 'REBP-1195',
            'joining_date' => '2019-08-01',
            'bank_name' => 'DBBL Agent Banking',
            'account_number' => '7017017978265',
            'pool_number' => '1999969188',
        ]);

        // BP 13
        $bp13 = User::create([
            'name' => 'Abul Bashar',
            'username' => '1999091313',
            'email' => 'bashar@enstudio.com.bd',
            'role' => 'bp',
            'dd_house_id' => 'MYMVAI03',
            'password' => 12345678,
        ]);
        Bp::create([
            'user_id' => $bp13->id,
            'supervisor_id' => DbTablesId::supervisorId('MYMVAI03'),
            'dd_house_id' => 'MYMVAI03',
            'stuff_id' => 'REBP-4506',
            'joining_date' => '2020-09-01',
            'bank_name' => 'DBBL',
            'account_number' => '173151136664',
            'pool_number' => '1999091313',
        ]);

        // BP 14
        $bp14 = User::create([
            'name' => 'Md. Mosharaf Hossain',
            'username' => '1999090915',
            'email' => 'mosharaf@enstudio.com.bd',
            'role' => 'bp',
            'dd_house_id' => 'MYMVAI03',
            'password' => 12345678,
        ]);
        Bp::create([
            'user_id' => $bp14->id,
            'supervisor_id' => DbTablesId::supervisorId('MYMVAI03'),
            'dd_house_id' => 'MYMVAI03',
            'stuff_id' => 'REBP-8834',
            'joining_date' => '2022-07-01',
            'bank_name' => 'DBBL',
            'account_number' => '1731580014043',
            'pool_number' => '1999090915',
        ]);
    }
}
