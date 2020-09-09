<?php

use App\Models\Cate;
use Faker\Factory;
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

        /**
         * The main categories data.
         * 
         */
        factory(
            Cate::class,
            20
        )->create();

        /**
         * The subcategories data.
         * 
         */
        $faker = Factory::create();
        for ($i = 1; $i <= 20; $i++) {
            Cate::create([
                'name'      => $faker->word(),
                'slug'      => $faker->slug(),
                'status'    => $faker->boolean(),
                'parent_id' => $faker->randomDigitNot(0),
            ]);
        }

    }

}
