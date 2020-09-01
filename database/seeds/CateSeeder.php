<?php

use App\Models\Cate;
use Illuminate\Database\Seeder;

class CateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(
            Cate::class,
            20
        )->create();
    }
}
