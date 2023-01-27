<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call( RolesAndPermissionsSeeder::class );
        $this->call( DdHouseSeeder::class );
        $this->call( SuperAdminUserCreateSeeder::class );
        $this->call( ZmSeeder::class );
        $this->call( ManagerSeeder::class );
        $this->call( SupervisorSeeder::class );
        $this->call( RsoSeeder::class );
        $this->call( BpSeeder::class );
        $this->call( MerchandiserSeeder::class );
        $this->call( AccountantSeeder::class );


        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
