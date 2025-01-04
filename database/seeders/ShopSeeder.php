<?php

namespace Database\Seeders;

use App\Models\Shop;
use Illuminate\Database\Seeder;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            [
                'mobile' => '+250 787 398 225',
                'email_one' => 'stanley@promacnuts.rw',
                'email_two' => 'info@promacnuts.rw',
                'address' => 'Rulindo, near Rusine market',
                'twitter' => 'https://x.com/promacnuts',
                'instagram' => 'https://www.instagram.com/promacnuts/',
                'facebook' => 'https://www.facebook.com/profile.php?id=61566858972913',
                'linkedin' => 'test',
                'youtube' => 'test',
            ],

        ];
        Shop::insert($settings);
    }
}
