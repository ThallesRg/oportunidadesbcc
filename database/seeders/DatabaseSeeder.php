<?php

namespace Database\Seeders;

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
        $this->call([
            CategorySeeder::class,
            RolePermissionSeeder::class,
            UserSeeder::class,
            CompanySeeder::class,
            IntercambioSeeder::class,
            EventSeeder::class,
            ScholarshipsSeeder::class
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
