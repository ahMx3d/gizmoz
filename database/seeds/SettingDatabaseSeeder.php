<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Setting::setMany([
            'default_locale'        => 'en',
            'default_timezone'      => 'Africa/Cairo',
            'reviews_enabled'       => true,
            'auto_approve_reviews'  => true,
            'supported_currencies'  => [
                'USD',
                'LE',
                'SAR',
            ],
            'default_currency'      => 'USD',
            'store_email'           => 'admin@admin.com',
            'search_engine'         => 'mysql',
            'free_shipping_cost'    => 0,
            'local_pickup_cost'     => 0,
            'flat_rate_cost'        => 0,
            'translatable'          => [
                'store_name'            => 'Gizmoz',
                'free_shipping_label'   => 'Free shipping',
                'local_pickup_label'    => 'Local pickup',
                'flat_rate_label'       => 'Flat rate',
            ],
        ]);
    }
}
