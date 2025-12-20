<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSetting; // Import the SiteSetting model

class SiteSettingsSeeder extends Seeder
{
    public function run()
    {
        // Using the SiteSetting model to insert data
        SiteSetting::create([
            'setting_key' => 'site_name',
            'setting_value' => 'My Awesome Website',
            'setting_type' => 'text',
        ]);

        SiteSetting::create([
            'setting_key' => 'site_logo',
            'setting_value' => 'logo.png', // You can use a default path or URL for the logo
            'setting_type' => 'image',
        ]);

        SiteSetting::create([
            'setting_key' => 'footer_text',
            'setting_value' => '© 2025 My Company',
            'setting_type' => 'text',
        ]);

        SiteSetting::create([
            'setting_key' => 'social_facebook',
            'setting_value' => 'https://facebook.com/mywebsite',
            'setting_type' => 'url',
        ]);

        SiteSetting::create([
            'setting_key' => 'social_twitter',
            'setting_value' => 'https://twitter.com/mywebsite',
            'setting_type' => 'url',
        ]);
    }
}
