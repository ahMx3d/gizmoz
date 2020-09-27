<?php

use App\Models\Cate;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

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
        // $faker = Factory::create();
        // for ($i = 1; $i <= 20; $i++) {
        //     Cate::create([
        //         'name'      => $faker->word(),
        //         'slug'      => $faker->slug(),
        //         'status'    => $faker->boolean(),
        //         'parent_id' => $faker->randomDigitNot(0),
        //     ]);
        // }

        $faker = Factory::create();
        $faker->addProvider(new \Faker\Provider\ar_JO\Person($faker));
        $data = [];
        for ($i = 1; $i <= 20; $i++) {
            $data[] = [
                'en' => [
                    'name'  => $faker->word()
                ],
                'ar' => [
                    'name'  => $faker->firstName()
                ],
                'slug'      => $faker->slug(),
                'status'    => $faker->boolean(),
                'parent_id' => $faker->numberBetween(1, 20),
            ];
        }
        foreach ($data as $datum) {
            Cate::create($datum);
        }
    }
}
