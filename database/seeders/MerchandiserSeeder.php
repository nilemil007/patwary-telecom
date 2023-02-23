<?php

namespace Database\Seeders;

use App\Models\Merchandiser;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MerchandiserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'name' => 'Sher Ali',
            'username' => 'sherali',
            'email' => 'sherali@enstudio.com.bd',
            'role' => 'tmo',
            'dd_house_id' => DbTablesId::ddHouseId(),
            'password' => 12345678,
        ]);
        Merchandiser::create([
            'user_id' => $user1->id,
            'dd_house_id' => DbTablesId::ddHouseId(),
            'pool_number' => '1958041928',
            'personal_number' => '1715969790',
            'bank_name' => 'DBBL',
            'account_number' => '1471030170630',
            'salary' => '15340',
            'nid' => '4810669278714',
            'dob' => '1984-05-04',
            'joining_date' => '2012-08-01',
        ]);

        $user2 = User::create([
            'name' => 'Ripon Miah',
            'username' => 'ripon',
            'email' => 'ripon@enstudio.com.bd',
            'role' => 'cm',
            'dd_house_id' => DbTablesId::ddHouseId('MYMVAI02'),
            'password' => 12345678,
        ]);
        Merchandiser::create([
            'user_id' => $user2->id,
            'dd_house_id' => DbTablesId::ddHouseId('MYMVAI02'),
            'pool_number' => '1958041929',
            'personal_number' => '1915272222',
            'bank_name' => 'DBBL',
            'account_number' => '1731510192456',
            'salary' => '9775',
            'nid' => '1026943108',
            'dob' => '1997-02-20',
            'joining_date' => '2019-03-01',
        ]);

        $user3 = User::create([
            'name' => 'Toriqul islam',
            'username' => 'toriqul',
            'email' => 'toriqul@enstudio.com.bd',
            'role' => 'cm',
            'dd_house_id' => DbTablesId::ddHouseId('MYMVAI03'),
            'password' => 12345678,
        ]);
        Merchandiser::create([
            'user_id' => $user3->id,
            'dd_house_id' => DbTablesId::ddHouseId('MYMVAI03'),
            'pool_number' => '1958041930',
            'personal_number' => '1912317878',
            'bank_name' => 'DBBL',
            'account_number' => '1731510105407',
            'salary' => '10200',
            'nid' => '19924811185000129',
            'dob' => '1992-03-12',
            'joining_date' => '2016-01-01',
        ]);

        $user4 = User::create([
            'name' => 'Anowar Hossain',
            'username' => 'anowar_cm',
            'email' => 'anowar_cm@enstudio.com.bd',
            'role' => 'cm',
            'dd_house_id' => DbTablesId::ddHouseId(),
            'password' => 12345678,
        ]);
        Merchandiser::create([
            'user_id' => $user4->id,
            'dd_house_id' => DbTablesId::ddHouseId(),
            'pool_number' => '1958041927',
            'personal_number' => '1912345399',
            'bank_name' => 'DBBL',
            'account_number' => '018582905628',
            'salary' => '10200',
            'nid' => '6013465411',
            'dob' => '1999-10-06',
            'joining_date' => '2020-09-01',
        ]);

        $user5 = User::create([
            'name' => 'Mannan',
            'username' => 'mannan',
            'email' => 'mannan@enstudio.com.bd',
            'role' => 'cm',
            'dd_house_id' => DbTablesId::ddHouseId('MYMVAI03'),
            'password' => 12345678,
        ]);
        Merchandiser::create([
            'user_id' => $user5->id,
            'dd_house_id' => DbTablesId::ddHouseId('MYMVAI03'),
            'pool_number' => '1958052101',
            'personal_number' => '1925627822',
            'bank_name' => 'DBBL',
            'account_number' => '2311050029853',
            'salary' => '9000',
            'nid' => '1909169300',
            'dob' => '1997-01-01',
            'joining_date' => '2022-02-10',
        ]);

        $user6 = User::create([
            'name' => 'Mr. A. R. Masum',
            'username' => 'masum',
            'email' => 'masum@enstudio.com.bd',
            'role' => 'cm',
            'dd_house_id' => DbTablesId::ddHouseId('MYMVAI02'),
            'password' => 12345678,
        ]);
        Merchandiser::create([
            'user_id' => $user6->id,
            'dd_house_id' => DbTablesId::ddHouseId('MYMVAI02'),
            'pool_number' => '',
            'personal_number' => '1915162211',
            'bank_name' => 'DBBL',
            'account_number' => '7017331933101',
            'salary' => '9000',
            'nid' => '',
            'dob' => '1982-08-23',
            'joining_date' => '2023-01-01',
        ]);
    }
}
