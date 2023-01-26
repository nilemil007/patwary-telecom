<?php

namespace Database\Seeders;

use App\Models\DdHouse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DdHouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $house = [
            [
                'cluster_name' => 'Central Cluster',
                'region' => 'Gazipur',
                'code' => 'MYMVAI01',
                'name' => 'Patwary Telecom',
                'market_status' => 'Strong',
                'email' => 'patwarytelecom@gmail.com',
                'district' => 'Kishoreganj',
                'address' => 'Kisukkhon patwary complex, Bongobondhu shoroni road, Bhairab, Kishoreganj.',
                'proprietor_name' => 'Shamsuzzaman Patwary',
                'proprietor_number' => '01917747555',
                'latitude' => '24.654205',
                'longitude' => '90.695405',
                'bts_code' => 'DHK1054',
                'established_year' => '2008',
                'image' => '',
                'status' => 1,
            ],
            [
                'cluster_name' => 'Central Cluster',
                'region' => 'Gazipur',
                'code' => 'MYMVAI02',
                'name' => 'M/S Modina Store',
                'market_status' => 'Strong',
                'email' => 'blmodinastore@gmail.com',
                'district' => 'Kishoreganj',
                'address' => 'Romjan ali vobon, Lonchghat, Mithamoin, Kishoreganj.',
                'proprietor_name' => 'Anisuzzaman Patwary',
                'proprietor_number' => '01911536262',
                'latitude' => '24.744205',
                'longitude' => '90.115405',
                'bts_code' => 'DHK1055',
                'established_year' => '2022',
                'image' => '',
                'status' => 1,
            ],
            [
                'cluster_name' => 'Central Cluster',
                'region' => 'Gazipur',
                'code' => 'MYMVAI03',
                'name' => 'Sumaya Enterprise',
                'market_status' => 'Strong',
                'email' => 'blsumayaenterprise@gmail.com',
                'district' => 'Kishoreganj',
                'address' => 'Vagolpur, Bajitpur, Kishoreganj.',
                'proprietor_name' => 'Shamsuzzaman Patwary',
                'proprietor_number' => '01917747555',
                'latitude' => '24.554205',
                'longitude' => '90.245405',
                'bts_code' => 'DHK1056',
                'established_year' => '2022',
                'image' => '',
                'status' => 1,
            ],
        ];

        DdHouse::insert( $house );
    }
}
