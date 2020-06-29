<?php

use App\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            [
                'id' => 1,
                'app_name' => 'ProjectX',
                'app_description' => 'ProjectX is a administration panel for Laravel and Vue.js',
                'app_keywords' => 'Laravel, Vue.js',
                'app_author' => 'Tristan Elliott',
                'app_author_link' => 'https://www.tristanelliott.co.za',
                'users_can_register' => 'Yes',
                'admin_email' => 'tristan@mintsmm.com',
                'posts_per_page' => '10',
            ]
        ];
        Setting::insert($settings);
    }
}
