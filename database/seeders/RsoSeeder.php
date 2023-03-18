<?php

namespace Database\Seeders;

use App\Models\DdHouse;
use App\Models\Nominee;
use App\Models\Rso;
use App\Models\Supervisor;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RsoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faijul = User::create([
            'name' => 'Faijul Islam',
            'username' => '1409944001',
            'email' => 'faijul@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => 'MYMVAI01',
            'password' => 12345678,
        ]);
        $rsoFaijul = Rso::create([
            'user_id' => $faijul->username,
            'supervisor_id' => '1923909896',
            'dd_house_id' => 'MYMVAI01',
            'itop_number' => '1409944001',
            'code' => 'RS033510',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsoFaijul->id]);

        $badiuzzaman = User::create([
            'name' => 'Badiuzzaman',
            'username' => '1908441955',
            'email' => 'badiuzzaman@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => 'MYMVAI01',
            'password' => 12345678,
        ]);
        $rsobadiuzzaman = Rso::create([
            'user_id' => $badiuzzaman->username,
            'supervisor_id' => '1923909896',
            'dd_house_id' => 'MYMVAI01',
            'itop_number' => '1908441955',
            'code' => 'RS019531',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsobadiuzzaman->id]);

        $joynalabedin = User::create([
            'name' => 'Md. Joynal Abedin',
            'username' => '1908441956',
            'email' => 'joynalabedin@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => 'MYMVAI01',
            'password' => 12345678,
        ]);
        $rsojoynalabedin = Rso::create([
            'user_id' => $joynalabedin->username,
            'supervisor_id' => '1923909896',
            'dd_house_id' => 'MYMVAI01',
            'itop_number' => '1908441956',
            'code' => 'RS019532',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsojoynalabedin->id]);

        $golammostufa = User::create([
            'name' => 'Md. Golam Mostufa',
            'username' => '1915270101',
            'email' => 'golammostufa@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => 'MYMVAI01',
            'password' => 12345678,
        ]);
        $rsogolammostufa = Rso::create([
            'user_id' => $golammostufa->username,
            'supervisor_id' => '1923909896',
            'dd_house_id' => 'MYMVAI01',
            'itop_number' => '1915270101',
            'code' => 'RS0101',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsogolammostufa->id]);

        $nazmulahmed = User::create([
            'name' => 'Nazmul Ahmed',
            'username' => '1915270102',
            'email' => 'nazmulahmed@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => 'MYMVAI01',
            'password' => 12345678,
        ]);
        $rsonazmulahmed = Rso::create([
            'user_id' => $nazmulahmed->username,
            'supervisor_id' => '1923909896',
            'dd_house_id' => 'MYMVAI01',
            'itop_number' => '1915270102',
            'code' => 'RS0103',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsonazmulahmed->id]);

        $porosh = User::create([
            'name' => 'Porosh',
            'username' => '1937600512',
            'email' => 'porosh@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => 'MYMVAI01',
            'password' => 12345678,
        ]);
        $rsoporosh = Rso::create([
            'user_id' => $porosh->username,
            'supervisor_id' => '1923909896',
            'dd_house_id' => 'MYMVAI01',
            'itop_number' => '1937600512',
            'code' => 'RS003981',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsoporosh->id]);

        $anikhasan = User::create([
            'name' => 'Md. Anik Hasan',
            'username' => '1984220363',
            'email' => 'anikhasan@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => 'MYMVAI01',
            'password' => 12345678,
        ]);
        $rsoanikhasan = Rso::create([
            'user_id' => $anikhasan->username,
            'supervisor_id' => '1923909896',
            'dd_house_id' => 'MYMVAI01',
            'itop_number' => '1984220363',
            'code' => 'RS017269',
            'gender' => 'male',
            ]);
        Nominee::create(['rso_id' => $rsoanikhasan->id]);

        $siyamhossain = User::create([
            'name' => 'Md. Siyam Hossain',
            'username' => '1984220364',
            'email' => 'siyamhossain@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => 'MYMVAI01',
            'password' => 12345678,
        ]);
        $rsosiyamhossain = Rso::create([
            'user_id' => $siyamhossain->username,
            'supervisor_id' => '1923909896',
            'dd_house_id' => 'MYMVAI01',
            'itop_number' => '1984220364',
            'code' => 'RS017271',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsosiyamhossain->id]);

        $habiburrahman = User::create([
            'name' => 'Habibur Rahman',
            'username' => '1986646474',
            'email' => 'habiburrahman@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => 'MYMVAI01',
            'password' => 12345678,
        ]);
        $rsohabiburrahman = Rso::create([
            'user_id' => $habiburrahman->username,
            'supervisor_id' => '1923909896',
            'dd_house_id' => 'MYMVAI01',
            'itop_number' => '1986646474',
            'code' => 'RS008290',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsohabiburrahman->id]);

        $mizan = User::create([
            'name' => 'Mizan',
            'username' => '1986686880',
            'email' => 'mizan@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => 'MYMVAI01',
            'password' => 12345678,
        ]);
        $rsomizan = Rso::create([
            'user_id' => $mizan->username,
            'supervisor_id' => '1923909896',
            'dd_house_id' => 'MYMVAI01',
            'itop_number' => '1986686880',
            'code' => 'RS010508',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsomizan->id]);

        $rakibmia = User::create([
            'name' => 'Rakib Mia',
            'username' => '1409944002',
            'email' => 'rakibmia@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => 'MYMVAI02',
            'password' => 12345678,
        ]);
        $rsorakibmia = Rso::create([
            'user_id' => $rakibmia->username,
            'supervisor_id' => '1923909897',
            'dd_house_id' => 'MYMVAI02',
            'itop_number' => '1409944002',
            'code' => 'RS035430',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsorakibmia->id]);

        $alam = User::create([
            'name' => 'Abdullah Al Alam',
            'username' => '1915270104',
            'email' => 'alam@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => 'MYMVAI02',
            'password' => 12345678,
        ]);
        $rsoalam = Rso::create([
            'user_id' => $alam->username,
            'supervisor_id' => '1923909897',
            'dd_house_id' => 'MYMVAI02',
            'itop_number' => '1915270104',
            'code' => 'RS035431',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsoalam->id]);

        $shakil = User::create([
            'name' => 'Shakil',
            'username' => '1915270105',
            'email' => 'shakil@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => 'MYMVAI02',
            'password' => 12345678,
        ]);
        $rsoshakil = Rso::create([
            'user_id' => $shakil->username,
            'supervisor_id' => '1923909897',
            'dd_house_id' => 'MYMVAI02',
            'itop_number' => '1915270105',
            'code' => 'RS035432',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsoshakil->id]);

        $jubayedmia = User::create([
            'name' => 'Md. Jubayed Mia',
            'username' => '1967042950',
            'email' => 'jubayedmia@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => 'MYMVAI02',
            'password' => 12345678,
        ]);
        $rsojubayedmia = Rso::create([
            'user_id' => $jubayedmia->username,
            'supervisor_id' => '1923909897',
            'dd_house_id' => 'MYMVAI02',
            'itop_number' => '1967042950',
            'code' => 'RS035433',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsojubayedmia->id]);

        $monirhossen = User::create([
            'name' => 'Md. Monir Hossen',
            'username' => '1986686877',
            'email' => 'monirhossen@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => 'MYMVAI02',
            'password' => 12345678,
        ]);
        $rsomonirhossen = Rso::create([
            'user_id' => $monirhossen->username,
            'supervisor_id' => '1923909897',
            'dd_house_id' => 'MYMVAI02',
            'itop_number' => '1986686877',
            'code' => 'RS035434',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsomonirhossen->id]);

        $shahinmia = User::create([
            'name' => 'Md. Shahin mia',
            'username' => '1986686878',
            'email' => 'shahinmia@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => 'MYMVAI02',
            'password' => 12345678,
        ]);
        $rsoshahinmia = Rso::create([
            'user_id' => $shahinmia->username,
            'supervisor_id' => '1923909897',
            'dd_house_id' => 'MYMVAI02',
            'itop_number' => '1986686878',
            'code' => 'RS035435',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsoshahinmia->id]);

        $ashiqurrahman = User::create([
            'name' => 'Ashiqur Rahman',
            'username' => '1986686879',
            'email' => 'ashiqurrahman@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => 'MYMVAI02',
            'password' => 12345678,
        ]);
        $rsoashiqurrahman = Rso::create([
            'user_id' => $ashiqurrahman->username,
            'supervisor_id' => '1923909897',
            'dd_house_id' => 'MYMVAI02',
            'itop_number' => '1986686879',
            'code' => 'RS035436',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsoashiqurrahman->id]);

        $safiqulislam = User::create([
            'name' => 'Safiqul Islam',
            'username' => '1409944003',
            'email' => 'safiqulislam@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => 'MYMVAI03',
            'password' => 12345678,
        ]);
        $rsosafiqulislam = Rso::create([
            'user_id' => $safiqulislam->username,
            'supervisor_id' => '1923909899',
            'dd_house_id' => 'MYMVAI03',
            'itop_number' => '1409944003',
            'code' => 'RS036629',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsosafiqulislam->id]);

        $saddam = User::create([
            'name' => 'Saddam Mia',
            'username' => '1908441954',
            'email' => 'saddam@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => 'MYMVAI03',
            'password' => 12345678,
        ]);
        $rsosaddam = Rso::create([
            'user_id' => $saddam->username,
            'supervisor_id' => '1923909899',
            'dd_house_id' => 'MYMVAI03',
            'itop_number' => '1908441954',
            'code' => 'RS036632',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsosaddam->id]);

        $bayazid = User::create([
            'name' => 'Md. Bayazid',
            'username' => '1915270103',
            'email' => 'bayazid@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => 'MYMVAI03',
            'password' => 12345678,
        ]);
        $rsobayazid = Rso::create([
            'user_id' => $bayazid->username,
            'supervisor_id' => '1923909899',
            'dd_house_id' => 'MYMVAI03',
            'itop_number' => '1915270103',
            'code' => 'RS036637',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsobayazid->id]);

        $raza = User::create([
            'name' => 'Saikoutz Zaman Raza',
            'username' => '1915270106',
            'email' => 'raza@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => 'MYMVAI03',
            'password' => 12345678,
        ]);
        $rsoraza = Rso::create([
            'user_id' => $raza->username,
            'supervisor_id' => '1923909899',
            'dd_house_id' => 'MYMVAI03',
            'itop_number' => '1915270106',
            'code' => 'RS036633',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsoraza->id]);

        $runulamin = User::create([
            'name' => 'Ruhul Amin',
            'username' => '1915300196',
            'email' => 'runulamin@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => 'MYMVAI03',
            'password' => 12345678,
        ]);
        $rsorunulamin = Rso::create([
            'user_id' => $runulamin->username,
            'supervisor_id' => '1923909899',
            'dd_house_id' => 'MYMVAI03',
            'itop_number' => '1915300196',
            'code' => 'RS036635',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsorunulamin->id]);

        $monayamkhan = User::create([
            'name' => 'Monayam Khan',
            'username' => '1984217911',
            'email' => 'monayamkhan@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => 'MYMVAI03',
            'password' => 12345678,
        ]);
        $rsomonayamkhan = Rso::create([
            'user_id' => $monayamkhan->username,
            'supervisor_id' => '1923909899',
            'dd_house_id' => 'MYMVAI03',
            'itop_number' => '1984217911',
            'code' => 'RS036630',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsomonayamkhan->id]);

        $parvej = User::create([
            'name' => 'Parvej Mia',
            'username' => '1984217912',
            'email' => 'parvej@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => 'MYMVAI03',
            'password' => 12345678,
        ]);
        $rsoparvej = Rso::create([
            'user_id' => $parvej->username,
            'supervisor_id' => '1923909899',
            'dd_house_id' => 'MYMVAI03',
            'itop_number' => '1984217912',
            'code' => 'RS036636',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsoparvej->id]);

        $hridoy65 = User::create([
            'name' => 'Hridoy Mia',
            'username' => '1984220365',
            'email' => 'hridoy65@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => 'MYMVAI03',
            'password' => 12345678,
        ]);
        $rsohridoy65 = Rso::create([
            'user_id' => $hridoy65->username,
            'supervisor_id' => '1923909899',
            'dd_house_id' => 'MYMVAI03',
            'itop_number' => '1984220365',
            'code' => 'RS036634',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsohridoy65->id]);

        $hridoy66 = User::create([
            'name' => 'Hridoy Mia',
            'username' => '1984220366',
            'email' => 'hridoy66@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => 'MYMVAI03',
            'password' => 12345678,
        ]);
        $rsohridoy66 = Rso::create([
            'user_id' => $hridoy66->username,
            'supervisor_id' => '1923909899',
            'dd_house_id' => 'MYMVAI03',
            'itop_number' => '1984220366',
            'code' => 'RS036631',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsohridoy66->id]);
    }
}
