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
    private $house,$supervisor;

    public function __construct( DdHouseSupervisorId $ddHouseSupervisorId )
    {
        $this->house = $ddHouseSupervisorId;
        $this->supervisor = $ddHouseSupervisorId;
    }

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
            'email' => 'faijul@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => $this->house->patwary,
            'password' => 12345678,
        ]);
        $rsoFaijul = Rso::create([
            'user_id' => $faijul->id,
            'supervisor_id' => $this->supervisor->supervisor01,
            'dd_house_id' => $this->house->patwary,
            'itop_number' => '1409944001',
            'code' => 'RS033510',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsoFaijul->id]);

        $badiuzzaman = User::create([
            'name' => 'Badiuzzaman',
            'username' => 'badiuzzaman',
            'email' => 'badiuzzaman@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => $this->house->patwary,
            'password' => 12345678,
        ]);
        $rsobadiuzzaman = Rso::create([
            'user_id' => $badiuzzaman->id,
            'supervisor_id' => $this->supervisor->supervisor01,
            'dd_house_id' => $this->house->patwary,
            'itop_number' => '1908441955',
            'code' => 'RS019531',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsobadiuzzaman->id]);

        $joynalabedin = User::create([
            'name' => 'Md. Joynal Abedin',
            'username' => 'joynalabedin',
            'email' => 'joynalabedin@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => $this->house->patwary,
            'password' => 12345678,
        ]);
        $rsojoynalabedin = Rso::create([
            'user_id' => $joynalabedin->id,
            'supervisor_id' => $this->supervisor->supervisor01,
            'dd_house_id' => $this->house->patwary,
            'itop_number' => '1908441956',
            'code' => 'RS019532',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsojoynalabedin->id]);

        $golammostufa = User::create([
            'name' => 'Md. Golam Mostufa',
            'username' => 'golammostufa',
            'email' => 'golammostufa@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => $this->house->patwary,
            'password' => 12345678,
        ]);
        $rsogolammostufa = Rso::create([
            'user_id' => $golammostufa->id,
            'supervisor_id' => $this->supervisor->supervisor01,
            'dd_house_id' => $this->house->patwary,
            'itop_number' => '1915270101',
            'code' => 'RS0101',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsogolammostufa->id]);

        $nazmulahmed = User::create([
            'name' => 'Nazmul Ahmed',
            'username' => 'nazmulahmed',
            'email' => 'nazmulahmed@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => $this->house->patwary,
            'password' => 12345678,
        ]);
        $rsonazmulahmed = Rso::create([
            'user_id' => $nazmulahmed->id,
            'supervisor_id' => $this->supervisor->supervisor01,
            'dd_house_id' => $this->house->patwary,
            'itop_number' => '1915270102',
            'code' => 'RS0103',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsonazmulahmed->id]);

        $porosh = User::create([
            'name' => 'Porosh',
            'username' => 'porosh',
            'email' => 'porosh@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => $this->house->patwary,
            'password' => 12345678,
        ]);
        $rsoporosh = Rso::create([
            'user_id' => $porosh->id,
            'supervisor_id' => $this->supervisor->supervisor01,
            'dd_house_id' => $this->house->patwary,
            'itop_number' => '1937600512',
            'code' => 'RS003981',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsoporosh->id]);

        $anikhasan = User::create([
            'name' => 'Md. Anik Hasan',
            'username' => 'anikhasan',
            'email' => 'anikhasan@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => $this->house->patwary,
            'password' => 12345678,
        ]);
        $rsoanikhasan = Rso::create([
            'user_id' => $anikhasan->id,
            'supervisor_id' => $this->supervisor->supervisor01,
            'dd_house_id' => $this->house->patwary,
            'itop_number' => '1984220363',
            'code' => 'RS017269',
            'gender' => 'male',
            ]);
        Nominee::create(['rso_id' => $rsoanikhasan->id]);

        $siyamhossain = User::create([
            'name' => 'Md. Siyam Hossain',
            'username' => 'siyamhossain',
            'email' => 'siyamhossain@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => $this->house->patwary,
            'password' => 12345678,
        ]);
        $rsosiyamhossain = Rso::create([
            'user_id' => $siyamhossain->id,
            'supervisor_id' => $this->supervisor->supervisor01,
            'dd_house_id' => $this->house->patwary,
            'itop_number' => '1984220364',
            'code' => 'RS017271',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsosiyamhossain->id]);

        $habiburrahman = User::create([
            'name' => 'Habibur Rahman',
            'username' => 'habiburrahman',
            'email' => 'habiburrahman@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => $this->house->patwary,
            'password' => 12345678,
        ]);
        $rsohabiburrahman = Rso::create([
            'user_id' => $habiburrahman->id,
            'supervisor_id' => $this->supervisor->supervisor01,
            'dd_house_id' => $this->house->patwary,
            'itop_number' => '1986646474',
            'code' => 'RS008290',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsohabiburrahman->id]);

        $mizan = User::create([
            'name' => 'Mizan',
            'username' => 'mizan',
            'email' => 'mizan@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => $this->house->patwary,
            'password' => 12345678,
        ]);
        $rsomizan = Rso::create([
            'user_id' => $mizan->id,
            'supervisor_id' => $this->supervisor->supervisor01,
            'dd_house_id' => $this->house->patwary,
            'itop_number' => '1986686880',
            'code' => 'RS010508',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsomizan->id]);

        $rakibmia = User::create([
            'name' => 'Rakib Mia',
            'username' => 'rakibmia',
            'email' => 'rakibmia@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => $this->house->modina,
            'password' => 12345678,
        ]);
        $rsorakibmia = Rso::create([
            'user_id' => $rakibmia->id,
            'supervisor_id' => $this->supervisor->supervisor02,
            'dd_house_id' => $this->house->modina,
            'itop_number' => '1409944002',
            'code' => 'RS035430',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsorakibmia->id]);

        $alam = User::create([
            'name' => 'Abdullah Al Alam',
            'username' => 'alam',
            'email' => 'alam@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => $this->house->modina,
            'password' => 12345678,
        ]);
        $rsoalam = Rso::create([
            'user_id' => $alam->id,
            'supervisor_id' => $this->supervisor->supervisor02,
            'dd_house_id' => $this->house->modina,
            'itop_number' => '1915270104',
            'code' => 'RS035431',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsoalam->id]);

        $shakil = User::create([
            'name' => 'Shakil',
            'username' => 'shakil',
            'email' => 'shakil@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => $this->house->modina,
            'password' => 12345678,
        ]);
        $rsoshakil = Rso::create([
            'user_id' => $shakil->id,
            'supervisor_id' => $this->supervisor->supervisor02,
            'dd_house_id' => $this->house->modina,
            'itop_number' => '1915270105',
            'code' => 'RS035432',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsoshakil->id]);

        $jubayedmia = User::create([
            'name' => 'Md. Jubayed Mia',
            'username' => 'jubayedmia',
            'email' => 'jubayedmia@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => $this->house->modina,
            'password' => 12345678,
        ]);
        $rsojubayedmia = Rso::create([
            'user_id' => $jubayedmia->id,
            'supervisor_id' => $this->supervisor->supervisor02,
            'dd_house_id' => $this->house->modina,
            'itop_number' => '1967042950',
            'code' => 'RS035433',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsojubayedmia->id]);

        $monirhossen = User::create([
            'name' => 'Md. Monir Hossen',
            'username' => 'monirhossen',
            'email' => 'monirhossen@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => $this->house->modina,
            'password' => 12345678,
        ]);
        $rsomonirhossen = Rso::create([
            'user_id' => $monirhossen->id,
            'supervisor_id' => $this->supervisor->supervisor02,
            'dd_house_id' => $this->house->modina,
            'itop_number' => '1986686877',
            'code' => 'RS035434',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsomonirhossen->id]);

        $shahinmia = User::create([
            'name' => 'Md. Shahin mia',
            'username' => 'shahinmia',
            'email' => 'shahinmia@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => $this->house->modina,
            'password' => 12345678,
        ]);
        $rsoshahinmia = Rso::create([
            'user_id' => $shahinmia->id,
            'supervisor_id' => $this->supervisor->supervisor02,
            'dd_house_id' => $this->house->modina,
            'itop_number' => '1986686878',
            'code' => 'RS035435',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsoshahinmia->id]);

        $ashiqurrahman = User::create([
            'name' => 'Ashiqur Rahman',
            'username' => 'ashiqurrahman',
            'email' => 'ashiqurrahman@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => $this->house->modina,
            'password' => 12345678,
        ]);
        $rsoashiqurrahman = Rso::create([
            'user_id' => $ashiqurrahman->id,
            'supervisor_id' => $this->supervisor->supervisor02,
            'dd_house_id' => $this->house->modina,
            'itop_number' => '1986686879',
            'code' => 'RS035436',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsoashiqurrahman->id]);

        $safiqulislam = User::create([
            'name' => 'Safiqul Islam',
            'username' => 'safiqulislam',
            'email' => 'safiqulislam@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => $this->house->sumaya,
            'password' => 12345678,
        ]);
        $rsosafiqulislam = Rso::create([
            'user_id' => $safiqulislam->id,
            'supervisor_id' => $this->supervisor->supervisor03,
            'dd_house_id' => $this->house->sumaya,
            'itop_number' => '1409944003',
            'code' => 'RS036629',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsosafiqulislam->id]);

        $saddam = User::create([
            'name' => 'Saddam Mia',
            'username' => 'saddam',
            'email' => 'saddam@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => $this->house->sumaya,
            'password' => 12345678,
        ]);
        $rsosaddam = Rso::create([
            'user_id' => $saddam->id,
            'supervisor_id' => $this->supervisor->supervisor03,
            'dd_house_id' => $this->house->sumaya,
            'itop_number' => '1908441954',
            'code' => 'RS036632',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsosaddam->id]);

        $bayazid = User::create([
            'name' => 'Md. Bayazid',
            'username' => 'bayazid',
            'email' => 'bayazid@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => $this->house->sumaya,
            'password' => 12345678,
        ]);
        $rsobayazid = Rso::create([
            'user_id' => $bayazid->id,
            'supervisor_id' => $this->supervisor->supervisor03,
            'dd_house_id' => $this->house->sumaya,
            'itop_number' => '1915270103',
            'code' => 'RS036637',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsobayazid->id]);

        $raza = User::create([
            'name' => 'Saikoutz Zaman Raza',
            'username' => 'raza',
            'email' => 'raza@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => $this->house->sumaya,
            'password' => 12345678,
        ]);
        $rsoraza = Rso::create([
            'user_id' => $raza->id,
            'supervisor_id' => $this->supervisor->supervisor03,
            'dd_house_id' => $this->house->sumaya,
            'itop_number' => '1915270106',
            'code' => 'RS036633',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsoraza->id]);

        $runulamin = User::create([
            'name' => 'Ruhul Amin',
            'username' => 'runulamin',
            'email' => 'runulamin@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => $this->house->sumaya,
            'password' => 12345678,
        ]);
        $rsorunulamin = Rso::create([
            'user_id' => $runulamin->id,
            'supervisor_id' => $this->supervisor->supervisor03,
            'dd_house_id' => $this->house->sumaya,
            'itop_number' => '1915300196',
            'code' => 'RS036635',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsorunulamin->id]);

        $monayamkhan = User::create([
            'name' => 'Monayam Khan',
            'username' => 'monayamkhan',
            'email' => 'monayamkhan@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => $this->house->sumaya,
            'password' => 12345678,
        ]);
        $rsomonayamkhan = Rso::create([
            'user_id' => $monayamkhan->id,
            'supervisor_id' => $this->supervisor->supervisor03,
            'dd_house_id' => $this->house->sumaya,
            'itop_number' => '1984217911',
            'code' => 'RS036630',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsomonayamkhan->id]);

        $parvej = User::create([
            'name' => 'Parvej Mia',
            'username' => 'parvej',
            'email' => 'parvej@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => $this->house->sumaya,
            'password' => 12345678,
        ]);
        $rsoparvej = Rso::create([
            'user_id' => $parvej->id,
            'supervisor_id' => $this->supervisor->supervisor03,
            'dd_house_id' => $this->house->sumaya,
            'itop_number' => '1984217912',
            'code' => 'RS036636',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsoparvej->id]);

        $hridoy65 = User::create([
            'name' => 'Hridoy Mia',
            'username' => 'hridoy65',
            'email' => 'hridoy65@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => $this->house->sumaya,
            'password' => 12345678,
        ]);
        $rsohridoy65 = Rso::create([
            'user_id' => $hridoy65->id,
            'supervisor_id' => $this->supervisor->supervisor03,
            'dd_house_id' => $this->house->sumaya,
            'itop_number' => '1984220365',
            'code' => 'RS036634',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsohridoy65->id]);

        $hridoy66 = User::create([
            'name' => 'Hridoy Mia',
            'username' => 'hridoy66',
            'email' => 'hridoy66@enstudio.com.bd',
            'role' => 'rso',
            'dd_house_id' => $this->house->sumaya,
            'password' => 12345678,
        ]);
        $rsohridoy66 = Rso::create([
            'user_id' => $hridoy66->id,
            'supervisor_id' => $this->supervisor->supervisor03,
            'dd_house_id' => $this->house->sumaya,
            'itop_number' => '1984220366',
            'code' => 'RS036631',
            'gender' => 'male',
        ]);
        Nominee::create(['rso_id' => $rsohridoy66->id]);
    }
}
