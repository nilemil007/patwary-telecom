<?php

namespace Database\Seeders;

use App\Models\Bp;
use App\Models\Supervisor;
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
            'username' => 'faruk',
            'email' => 'faruk@enstudio.com.bd',
            'role' => 'bp',
            'dd_house_id' => 1,
            'password' => 12345678,
        ]);
        $bp1->assignRole('bp');
        $supervisor = Supervisor::firstWhere('dd_house_id', $bp1->dd_house_id)->id;
        Bp::create([
            'user_id' => $bp1->id,
            'supervisor_id' => $supervisor,
            'dd_house_id' => $bp1->dd_house_id,
            'stuff_id' => 'REBP-1194',
            'pool_number' => '1999969197',
            'joining_date' => '2019-08-01',
            'bank_name' => 'DBBL Agent Banking',
            'account_number' => '7017510197800',
        ]);

        // BP 02
        $bp2 = User::create([
            'name' => 'Sadekin Islam',
            'username' => 'sadekin',
            'email' => 'sadekin@enstudio.com.bd',
            'role' => 'bp',
            'dd_house_id' => 1,
            'password' => 12345678,
        ]);
        $bp2->assignRole('bp');
        $supervisor = Supervisor::firstWhere('dd_house_id', $bp2->dd_house_id)->id;
        Bp::create([
            'user_id' => $bp2->id,
            'supervisor_id' => $supervisor,
            'dd_house_id' => $bp2->dd_house_id,
            'stuff_id' => 'REBP-1196',
            'joining_date' => '2019-08-01',
            'bank_name' => 'DBBL Agent Banking',
            'account_number' => '7017018598361',
            'pool_number' => '1999092584',
        ]);

        // BP 03
        $bp3 = User::create([
            'name' => 'Nayeem Miah',
            'username' => 'nayeem',
            'email' => 'nayeem@enstudio.com.bd',
            'role' => 'bp',
            'dd_house_id' => 1,
            'password' => 12345678,
        ]);
        $bp3->assignRole('bp');
        $supervisor = Supervisor::firstWhere('dd_house_id', $bp3->dd_house_id)->id;
        Bp::create([
            'user_id' => $bp3->id,
            'supervisor_id' => $supervisor,
            'dd_house_id' => $bp3->dd_house_id,
            'stuff_id' => 'REBP-1197',
            'joining_date' => '2019-08-01',
            'bank_name' => 'DBBL Agent Banking',
            'account_number' => '7017512885377',
            'pool_number' => '1999969193',
        ]);

        // BP 04
        $bp4 = User::create([
            'name' => 'Muhammad Sujon Khan',
            'username' => 'sujon',
            'email' => 'sujon@enstudio.com.bd',
            'role' => 'bp',
            'dd_house_id' => 1,
            'password' => 12345678,
        ]);
        $bp4->assignRole('bp');
        $supervisor = Supervisor::firstWhere('dd_house_id', $bp4->dd_house_id)->id;
        Bp::create([
            'user_id' => $bp4->id,
            'supervisor_id' => $supervisor,
            'dd_house_id' => $bp4->dd_house_id,
            'stuff_id' => 'REBP-5091',
            'joining_date' => '2020-12-01',
            'bank_name' => 'DBBL Agent Banking',
            'account_number' => '7017515755546',
            'pool_number' => '1999969196',
        ]);

        // BP 05
        $bp5 = User::create([
            'name' => 'Anowar Hossain',
            'username' => 'anowar',
            'email' => 'anowar@enstudio.com.bd',
            'role' => 'bp',
            'dd_house_id' => 1,
            'password' => 12345678,
        ]);
        $bp5->assignRole('bp');
        $supervisor = Supervisor::firstWhere('dd_house_id', $bp5->dd_house_id)->id;
        Bp::create([
            'user_id' => $bp5->id,
            'supervisor_id' => $supervisor,
            'dd_house_id' => $bp5->dd_house_id,
            'stuff_id' => 'REBP-7651',
            'joining_date' => '2022-02-01',
            'bank_name' => 'DBBL',
            'account_number' => '1731580014038',
            'pool_number' => '1999968811',
        ]);

        // BP 06
        $bp6 = User::create([
            'name' => 'Md. Deloar Hossain',
            'username' => 'deloar',
            'email' => 'deloar@enstudio.com.bd',
            'role' => 'bp',
            'dd_house_id' => 1,
            'password' => 12345678,
        ]);
        $bp6->assignRole('bp');
        $supervisor = Supervisor::firstWhere('dd_house_id', $bp6->dd_house_id)->id;
        Bp::create([
            'user_id' => $bp6->id,
            'supervisor_id' => $supervisor,
            'dd_house_id' => $bp6->dd_house_id,
            'stuff_id' => 'REBP-7653',
            'joining_date' => '2022-02-01',
            'bank_name' => 'DBBL',
            'account_number' => '1731580014246',
            'pool_number' => '1999968890',
        ]);

        // BP 07
        $bp7 = User::create([
            'name' => 'Md. Sizal Miah',
            'username' => 'sizal',
            'email' => 'sizal@enstudio.com.bd',
            'role' => 'bp',
            'dd_house_id' => 1,
            'password' => 12345678,
        ]);
        $bp7->assignRole('bp');
        $supervisor = Supervisor::firstWhere('dd_house_id', $bp7->dd_house_id)->id;
        Bp::create([
            'user_id' => $bp7->id,
            'supervisor_id' => $supervisor,
            'dd_house_id' => $bp7->dd_house_id,
            'stuff_id' => 'REBP-8833',
            'joining_date' => '2022-07-01',
            'bank_name' => 'DBBL',
            'account_number' => '1731580014288',
            'pool_number' => '1999968838',
        ]);

        // BP 08
        $bp8 = User::create([
            'name' => 'Monirul Islam Panna',
            'username' => 'panna',
            'email' => 'panna@enstudio.com.bd',
            'role' => 'bp',
            'dd_house_id' => 2,
            'password' => 12345678,
        ]);
        $bp8->assignRole('bp');
        $supervisor = Supervisor::firstWhere('dd_house_id', $bp8->dd_house_id)->id;
        Bp::create([
            'user_id' => $bp8->id,
            'supervisor_id' => $supervisor,
            'dd_house_id' => $bp8->dd_house_id,
            'stuff_id' => 'REBP-4508',
            'joining_date' => '2020-09-01',
            'bank_name' => 'DBBL Agent Banking',
            'account_number' => '7017516565032',
            'pool_number' => '1999969198',
        ]);

        // BP 09
        $bp9 = User::create([
            'name' => 'Monayam',
            'username' => 'monayam',
            'email' => 'monayam@enstudio.com.bd',
            'role' => 'bp',
            'dd_house_id' => 2,
            'password' => 12345678,
        ]);
        $bp9->assignRole('bp');
        $supervisor = Supervisor::firstWhere('dd_house_id', $bp9->dd_house_id)->id;
        Bp::create([
            'user_id' => $bp9->id,
            'supervisor_id' => $supervisor,
            'dd_house_id' => $bp9->dd_house_id,
            'stuff_id' => 'REBP-7650',
            'joining_date' => '2022-02-01',
            'bank_name' => 'DBBL Agent Banking',
            'account_number' => '7017010642810',
            'pool_number' => '1999968844',
        ]);

        // BP 10
        $bp10 = User::create([
            'name' => 'Maruf Hasan Arnob',
            'username' => 'arnob',
            'email' => 'arnob@enstudio.com.bd',
            'role' => 'bp',
            'dd_house_id' => 2,
            'password' => 12345678,
        ]);
        $bp10->assignRole('bp');
        $supervisor = Supervisor::firstWhere('dd_house_id', $bp10->dd_house_id)->id;
        Bp::create([
            'user_id' => $bp10->id,
            'supervisor_id' => $supervisor,
            'dd_house_id' => $bp10->dd_house_id,
            'stuff_id' => 'REBP-7654',
            'joining_date' => '2022-02-01',
            'bank_name' => 'DBBL Agent Banking',
            'account_number' => '7017323544425',
            'pool_number' => '1999968907',
        ]);

        // BP 11
        $bp11 = User::create([
            'name' => 'Soharaf Miah',
            'username' => 'soharaf',
            'email' => 'soharaf@enstudio.com.bd',
            'role' => 'bp',
            'dd_house_id' => 2,
            'password' => 12345678,
        ]);
        $bp11->assignRole('bp');
        $supervisor = Supervisor::firstWhere('dd_house_id', $bp11->dd_house_id)->id;
        Bp::create([
            'user_id' => $bp11->id,
            'supervisor_id' => $supervisor,
            'dd_house_id' => $bp11->dd_house_id,
            'stuff_id' => 'REBP-8068',
            'joining_date' => '2022-04-01',
            'bank_name' => 'DBBL Agent Banking',
            'account_number' => '7017017978356',
            'pool_number' => '1999968899',
        ]);

        // BP 12
        $bp12 = User::create([
            'name' => 'Mamun Miah',
            'username' => 'mamun',
            'email' => 'mamun@enstudio.com.bd',
            'role' => 'bp',
            'dd_house_id' => 3,
            'password' => 12345678,
        ]);
        $bp12->assignRole('bp');
        $supervisor = Supervisor::firstWhere('dd_house_id', $bp12->dd_house_id)->id;
        Bp::create([
            'user_id' => $bp12->id,
            'supervisor_id' => $supervisor,
            'dd_house_id' => $bp12->dd_house_id,
            'stuff_id' => 'REBP-1195',
            'joining_date' => '2019-08-01',
            'bank_name' => 'DBBL Agent Banking',
            'account_number' => '7017017978265',
            'pool_number' => '1999969188',
        ]);

        // BP 13
        $bp13 = User::create([
            'name' => 'Abul Bashar',
            'username' => 'bashar',
            'email' => 'bashar@enstudio.com.bd',
            'role' => 'bp',
            'dd_house_id' => 3,
            'password' => 12345678,
        ]);
        $bp13->assignRole('bp');
        $supervisor = Supervisor::firstWhere('dd_house_id', $bp13->dd_house_id)->id;
        Bp::create([
            'user_id' => $bp13->id,
            'supervisor_id' => $supervisor,
            'dd_house_id' => $bp13->dd_house_id,
            'stuff_id' => 'REBP-4506',
            'joining_date' => '2020-09-01',
            'bank_name' => 'DBBL',
            'account_number' => '173151136664',
            'pool_number' => '1999091313',
        ]);

        // BP 14
        $bp14 = User::create([
            'name' => 'Md. Mosharaf Hossain',
            'username' => 'mosharaf',
            'email' => 'mosharaf@enstudio.com.bd',
            'role' => 'bp',
            'dd_house_id' => 3,
            'password' => 12345678,
        ]);
        $bp14->assignRole('bp');
        $supervisor = Supervisor::firstWhere('dd_house_id', $bp14->dd_house_id)->id;
        Bp::create([
            'user_id' => $bp14->id,
            'supervisor_id' => $supervisor,
            'dd_house_id' => $bp14->dd_house_id,
            'stuff_id' => 'REBP-8834',
            'joining_date' => '2022-07-01',
            'bank_name' => 'DBBL',
            'account_number' => '1731580014043',
            'pool_number' => '1999090915',
        ]);
    }
}
