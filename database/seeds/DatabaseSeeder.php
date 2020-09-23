<?php

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
        // $this->call(UserSeeder::class);

        // DATA FOR ADMINS TABLE
        $this->call(AdminSeeder::class);
        // DATA FOR BRANDS TABLE
        $this->call(BrandSeeder::class);
        // DATA FOR CATES TABLE
        $this->call(CateSeeder::class);
        // DATA FOR SETTINGS TABLE
        $this->call(SettingDatabaseSeeder::class);
    }
}
