<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // UPDATE IF CREATED ELSE CREATE
        Admin::updateOrCreate(
            [
                'name' => 'admin'
            ],
            [
                'email' => 'admin@admin.com',
                'password' => 'adminadmin'
            ]
        );
    }
}
