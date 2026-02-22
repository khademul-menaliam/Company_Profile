<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SiteSettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            [
                'setting_key' => 'facebook',
                'setting_type' => 'url',
                'setting_value' => 'https://facebook.com/',
            ],
            [
                'setting_key' => 'linkedin',
                'setting_type' => 'url',
                'setting_value' => 'https://linkedin.com/',
            ],
            [
                'setting_key' => 'x',
                'setting_type' => 'url',
                'setting_value' => 'https://x.com/',
            ],
            [
                'setting_key' => 'office_address',
                'setting_type' => 'text',
                'setting_value' => 'House No: 15, Road No: 01, Block: A, Dhaka 1212',
            ],
            [
                'setting_key' => 'phone',
                'setting_type' => 'text',
                'setting_value' => '+880 1XXX-XXXXXX',
            ],
            [
                'setting_key' => 'email',
                'setting_type' => 'text',
                'setting_value' => 'info@arengineeringbd.com',
            ],
        ];

        foreach ($settings as $setting) {
            SiteSetting::updateOrCreate(
                ['setting_key' => $setting['setting_key']],
                $setting
            );
        }
    }
}
