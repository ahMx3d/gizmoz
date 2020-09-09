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

        /**
         * The main categories data.
         * 
         */
        $cates = factory(
            Cate::class,
            20
        )->create();

        // SUB CATEGORIES CREATION LOOP
        for ($i = 1; $i <= 20; $i++) {
            // $cate = $this->getRandCate();
            ##############################
            
            $cate = $cates->random();
            
            /**
             * The sub categories data.
             * 
             */
            $cate->update([
                'parent_id' => $cates->random()->id
            ]);
            ###############################
        }
    }

    // private function getRandCate()
    // {
    //     return Cate::inRandomOrder()->first();
    // }
}
