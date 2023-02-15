<?php

namespace Database\Seeders;

use App\Models\Nominee;
use App\Models\Rso;
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
            'username' => 'faijul',
            'email' => 'faijul@gmail.com',
            'role' => 'rso',
            'dd_house_id' => 1,
            'password' => 12345678,
        ]);
        $faijul->assignRole('rso');
        $rsoFaijul = Rso::create([
            'user_id' => $faijul->id,
            'supervisor_id' => 1,
            'dd_house_id' => 1,
            'zm_id' => 2,
            'manager_id' => 3,
            'itop_number' => '1409944001',
            'code' => 'RS033510',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsoFaijul->id]);

        $badiuzzaman = User::create([
            'name' => 'Badiuzzaman',
            'username' => 'badiuzzaman',
            'email' => 'badiuzzaman@gmail.com',
            'role' => 'rso',
            'dd_house_id' => 1,
            'password' => 12345678,
        ]);
        $badiuzzaman->assignRole('rso');
        $rsobadiuzzaman = Rso::create([
            'user_id' => $badiuzzaman->id,
            'supervisor_id' => 1,
            'dd_house_id' => 1,
            'zm_id' => 2,
            'manager_id' => 3,
            'itop_number' => '1908441955',
            'code' => 'RS019531',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsobadiuzzaman->id]);

        $joynalabedin = User::create([
            'name' => 'Md. Joynal Abedin',
            'username' => 'joynalabedin',
            'email' => 'joynalabedin@gmail.com',
            'role' => 'rso',
            'dd_house_id' => 1,
            'password' => 12345678,
        ]);
        $joynalabedin->assignRole('rso');
        $rsojoynalabedin = Rso::create([
            'user_id' => $joynalabedin->id,
            'supervisor_id' => 1,
            'dd_house_id' => 1,
            'zm_id' => 2,
            'manager_id' => 3,
            'itop_number' => '1908441956',
            'code' => 'RS019532',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsojoynalabedin->id]);

        $golammostufa = User::create([
            'name' => 'Md. Golam Mostufa',
            'username' => 'golammostufa',
            'email' => 'golammostufa@gmail.com',
            'role' => 'rso',
            'dd_house_id' => 1,
            'password' => 12345678,
        ]);
        $golammostufa->assignRole('rso');
        $rsogolammostufa = Rso::create([
            'user_id' => $golammostufa->id,
            'supervisor_id' => 1,
            'dd_house_id' => 1,
            'zm_id' => 2,
            'manager_id' => 3,
            'itop_number' => '1915270101',
            'code' => 'RS0101',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsogolammostufa->id]);

        $nazmulahmed = User::create([
            'name' => 'Nazmul Ahmed',
            'username' => 'nazmulahmed',
            'email' => 'nazmulahmed@gmail.com',
            'role' => 'rso',
            'dd_house_id' => 1,
            'password' => 12345678,
        ]);
        $nazmulahmed->assignRole('rso');
        $rsonazmulahmed = Rso::create([
            'user_id' => $nazmulahmed->id,
            'supervisor_id' => 1,
            'dd_house_id' => 1,
            'zm_id' => 2,
            'manager_id' => 3,
            'itop_number' => '1915270102',
            'code' => 'RS0103',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsonazmulahmed->id]);

        $porosh = User::create([
            'name' => 'Porosh',
            'username' => 'porosh',
            'email' => 'porosh@gmail.com',
            'role' => 'rso',
            'dd_house_id' => 1,
            'password' => 12345678,
        ]);
        $porosh->assignRole('rso');
        $rsoporosh = Rso::create([
            'user_id' => $porosh->id,
            'supervisor_id' => 1,
            'dd_house_id' => 1,
            'zm_id' => 2,
            'manager_id' => 3,
            'itop_number' => '1937600512',
            'code' => 'RS003981',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsoporosh->id]);

        $anikhasan = User::create([
            'name' => 'Md. Anik Hasan',
            'username' => 'anikhasan',
            'email' => 'anikhasan@gmail.com',
            'role' => 'rso',
            'dd_house_id' => 1,
            'password' => 12345678,
        ]);
        $anikhasan->assignRole('rso');
        $rsoanikhasan = Rso::create([
            'user_id' => $anikhasan->id,
            'supervisor_id' => 1,
            'dd_house_id' => 1,
            'zm_id' => 2,
            'manager_id' => 3,
            'itop_number' => '1984220363',
            'code' => 'RS017269',
            'gender' => 'male',
            ]);
        Nominee::create(['rso_id' => $rsoanikhasan->id]);

        $siyamhossain = User::create([
            'name' => 'Md. Siyam Hossain',
            'username' => 'siyamhossain',
            'email' => 'siyamhossain@gmail.com',
            'role' => 'rso',
            'dd_house_id' => 1,
            'password' => 12345678,
        ]);
        $siyamhossain->assignRole('rso');
        $rsosiyamhossain = Rso::create([
            'user_id' => $siyamhossain->id,
            'supervisor_id' => 1,
            'dd_house_id' => 1,
            'zm_id' => 2,
            'manager_id' => 3,
            'itop_number' => '1984220364',
            'code' => 'RS017271',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsosiyamhossain->id]);

        $habiburrahman = User::create([
            'name' => 'Habibur Rahman',
            'username' => 'habiburrahman',
            'email' => 'habiburrahman@gmail.com',
            'role' => 'rso',
            'dd_house_id' => 1,
            'password' => 12345678,
        ]);
        $habiburrahman->assignRole('rso');
        $rsohabiburrahman = Rso::create([
            'user_id' => $habiburrahman->id,
            'supervisor_id' => 1,
            'dd_house_id' => 1,
            'zm_id' => 2,
            'manager_id' => 3,
            'itop_number' => '1986646474',
            'code' => 'RS008290',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsohabiburrahman->id]);

        $mizan = User::create([
            'name' => 'Mizan',
            'username' => 'mizan',
            'email' => 'mizan@gmail.com',
            'role' => 'rso',
            'dd_house_id' => 1,
            'password' => 12345678,
        ]);
        $mizan->assignRole('rso');
        $rsomizan = Rso::create([
            'user_id' => $mizan->id,
            'supervisor_id' => 1,
            'dd_house_id' => 1,
            'zm_id' => 2,
            'manager_id' => 3,
            'itop_number' => '1986686880',
            'code' => 'RS010508',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsomizan->id]);

        $rakibmia = User::create([
            'name' => 'Rakib Mia',
            'username' => 'rakibmia',
            'email' => 'rakibmia@gmail.com',
            'role' => 'rso',
            'dd_house_id' => 2,
            'password' => 12345678,
        ]);
        $rakibmia->assignRole('rso');
        $rsorakibmia = Rso::create([
            'user_id' => $rakibmia->id,
            'supervisor_id' => 2,
            'dd_house_id' => 2,
            'zm_id' => 2,
            'manager_id' => 3,
            'itop_number' => '1409944002',
            'code' => 'RS035430',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsorakibmia->id]);

        $alam = User::create([
            'name' => 'Abdullah Al Alam',
            'username' => 'alam',
            'email' => 'alam@gmail.com',
            'role' => 'rso',
            'dd_house_id' => 2,
            'password' => 12345678,
        ]);
        $alam->assignRole('rso');
        $rsoalam = Rso::create([
            'user_id' => $alam->id,
            'supervisor_id' => 2,
            'dd_house_id' => 2,
            'zm_id' => 2,
            'manager_id' => 3,
            'itop_number' => '1915270104',
            'code' => 'RS035431',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsoalam->id]);

        $shakil = User::create([
            'name' => 'Shakil',
            'username' => 'shakil',
            'email' => 'shakil@gmail.com',
            'role' => 'rso',
            'dd_house_id' => 2,
            'password' => 12345678,
        ]);
        $shakil->assignRole('rso');
        $rsoshakil = Rso::create([
            'user_id' => $shakil->id,
            'supervisor_id' => 2,
            'dd_house_id' => 2,
            'zm_id' => 2,
            'manager_id' => 3,
            'itop_number' => '1915270105',
            'code' => 'RS035432',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsoshakil->id]);

        $jubayedmia = User::create([
            'name' => 'Md. Jubayed Mia',
            'username' => 'jubayedmia',
            'email' => 'jubayedmia@gmail.com',
            'role' => 'rso',
            'dd_house_id' => 2,
            'password' => 12345678,
        ]);
        $jubayedmia->assignRole('rso');
        $rsojubayedmia = Rso::create([
            'user_id' => $jubayedmia->id,
            'supervisor_id' => 2,
            'dd_house_id' => 2,
            'zm_id' => 2,
            'manager_id' => 3,
            'itop_number' => '1967042950',
            'code' => 'RS035433',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsojubayedmia->id]);

        $monirhossen = User::create([
            'name' => 'Md. Monir Hossen',
            'username' => 'monirhossen',
            'email' => 'monirhossen@gmail.com',
            'role' => 'rso',
            'dd_house_id' => 2,
            'password' => 12345678,
        ]);
        $monirhossen->assignRole('rso');
        $rsomonirhossen = Rso::create([
            'user_id' => $monirhossen->id,
            'supervisor_id' => 2,
            'dd_house_id' => 2,
            'zm_id' => 2,
            'manager_id' => 3,
            'itop_number' => '1986686877',
            'code' => 'RS035434',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsomonirhossen->id]);

        $shahinmia = User::create([
            'name' => 'Md. Shahin mia',
            'username' => 'shahinmia',
            'email' => 'shahinmia@gmail.com',
            'role' => 'rso',
            'dd_house_id' => 2,
            'password' => 12345678,
        ]);
        $shahinmia->assignRole('rso');
        $rsoshahinmia = Rso::create([
            'user_id' => $shahinmia->id,
            'supervisor_id' => 2,
            'dd_house_id' => 2,
            'zm_id' => 2,
            'manager_id' => 3,
            'itop_number' => '1986686878',
            'code' => 'RS035435',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsoshahinmia->id]);

        $ashiqurrahman = User::create([
            'name' => 'Ashiqur Rahman',
            'username' => 'ashiqurrahman',
            'email' => 'ashiqurrahman@gmail.com',
            'role' => 'rso',
            'dd_house_id' => 2,
            'password' => 12345678,
        ]);
        $ashiqurrahman->assignRole('rso');
        $rsoashiqurrahman = Rso::create([
            'user_id' => $ashiqurrahman->id,
            'supervisor_id' => 2,
            'dd_house_id' => 2,
            'zm_id' => 2,
            'manager_id' => 3,
            'itop_number' => '1986686879',
            'code' => 'RS035436',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsoashiqurrahman->id]);

        $safiqulislam = User::create([
            'name' => 'Safiqul Islam',
            'username' => 'safiqulislam',
            'email' => 'safiqulislam@gmail.com',
            'role' => 'rso',
            'dd_house_id' => 3,
            'password' => 12345678,
        ]);
        $safiqulislam->assignRole('rso');
        $rsosafiqulislam = Rso::create([
            'user_id' => $safiqulislam->id,
            'supervisor_id' => 3,
            'dd_house_id' => 3,
            'zm_id' => 2,
            'manager_id' => 3,
            'itop_number' => '1409944003',
            'code' => 'RS036629',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsosafiqulislam->id]);

        $saddam = User::create([
            'name' => 'Saddam Mia',
            'username' => 'saddam',
            'email' => 'saddam@gmail.com',
            'role' => 'rso',
            'dd_house_id' => 3,
            'password' => 12345678,
        ]);
        $saddam->assignRole('rso');
        $rsosaddam = Rso::create([
            'user_id' => $saddam->id,
            'supervisor_id' => 3,
            'dd_house_id' => 3,
            'zm_id' => 2,
            'manager_id' => 3,
            'itop_number' => '1908441954',
            'code' => 'RS036632',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsosaddam->id]);

        $bayazid = User::create([
            'name' => 'Md. Bayazid',
            'username' => 'bayazid',
            'email' => 'bayazid@gmail.com',
            'role' => 'rso',
            'dd_house_id' => 3,
            'password' => 12345678,
        ]);
        $bayazid->assignRole('rso');
        $rsobayazid = Rso::create([
            'user_id' => $bayazid->id,
            'supervisor_id' => 3,
            'dd_house_id' => 3,
            'zm_id' => 2,
            'manager_id' => 3,
            'itop_number' => '1915270103',
            'code' => 'RS036637',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsobayazid->id]);

        $raza = User::create([
            'name' => 'Saikoutz Zaman Raza',
            'username' => 'raza',
            'email' => 'raza@gmail.com',
            'role' => 'rso',
            'dd_house_id' => 3,
            'password' => 12345678,
        ]);
        $raza->assignRole('rso');
        $rsoraza = Rso::create([
            'user_id' => $raza->id,
            'supervisor_id' => 3,
            'dd_house_id' => 3,
            'zm_id' => 2,
            'manager_id' => 3,
            'itop_number' => '1915270106',
            'code' => 'RS036633',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsoraza->id]);

        $runulamin = User::create([
            'name' => 'Ruhul Amin',
            'username' => 'runulamin',
            'email' => 'runulamin@gmail.com',
            'role' => 'rso',
            'dd_house_id' => 3,
            'password' => 12345678,
        ]);
        $runulamin->assignRole('rso');
        $rsorunulamin = Rso::create([
            'user_id' => $runulamin->id,
            'supervisor_id' => 3,
            'dd_house_id' => 3,
            'zm_id' => 2,
            'manager_id' => 3,
            'itop_number' => '1915300196',
            'code' => 'RS036635',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsorunulamin->id]);

        $monayamkhan = User::create([
            'name' => 'Monayam Khan',
            'username' => 'monayamkhan',
            'email' => 'monayamkhan@gmail.com',
            'role' => 'rso',
            'dd_house_id' => 3,
            'password' => 12345678,
        ]);
        $monayamkhan->assignRole('rso');
        $rsomonayamkhan = Rso::create([
            'user_id' => $monayamkhan->id,
            'supervisor_id' => 3,
            'dd_house_id' => 3,
            'zm_id' => 2,
            'manager_id' => 3,
            'itop_number' => '1984217911',
            'code' => 'RS036630',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsomonayamkhan->id]);

        $parvej = User::create([
            'name' => 'Parvej Mia',
            'username' => 'parvej',
            'email' => 'parvej@gmail.com',
            'role' => 'rso',
            'dd_house_id' => 3,
            'password' => 12345678,
        ]);
        $parvej->assignRole('rso');
        $rsoparvej = Rso::create([
            'user_id' => $parvej->id,
            'supervisor_id' => 3,
            'dd_house_id' => 3,
            'zm_id' => 2,
            'manager_id' => 3,
            'itop_number' => '1984217912',
            'code' => 'RS036636',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsoparvej->id]);

        $hridoy65 = User::create([
            'name' => 'Hridoy Mia',
            'username' => 'hridoy65',
            'email' => 'hridoy65@gmail.com',
            'role' => 'rso',
            'dd_house_id' => 3,
            'password' => 12345678,
        ]);
        $hridoy65->assignRole('rso');
        $rsohridoy65 = Rso::create([
            'user_id' => $hridoy65->id,
            'supervisor_id' => 3,
            'dd_house_id' => 3,
            'zm_id' => 2,
            'manager_id' => 3,
            'itop_number' => '1984220365',
            'code' => 'RS036634',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsohridoy65->id]);

        $hridoy66 = User::create([
            'name' => 'Hridoy Mia',
            'username' => 'hridoy66',
            'email' => 'hridoy66@gmail.com',
            'role' => 'rso',
            'dd_house_id' => 3,
            'password' => 12345678,
        ]);
        $hridoy66->assignRole('rso');
        $rsohridoy66 = Rso::create([
            'user_id' => $hridoy66->id,
            'supervisor_id' => 3,
            'dd_house_id' => 3,
            'zm_id' => 2,
            'manager_id' => 3,
            'itop_number' => '1984220366',
            'code' => 'RS036631',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsohridoy66->id]);
    }
}
