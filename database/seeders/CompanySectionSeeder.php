<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CompanySection;

class CompanySectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hero Sliders
        $sliders = [
            [
                'section' => 'hero_slider',
                'type' => 'slide',
                'title' => 'Your Vision, Our Engineering',
                'subtitle' => 'Providing innovative industrial engineering solutions.',
                'content' => '/services', // Using content as link
                'status' => true,
                'sort_order' => 1,
            ],
            [
                'section' => 'hero_slider',
                'type' => 'slide',
                'title' => 'Consulting & Projects',
                'subtitle' => 'Expertise in MEP design, simulation, and installations.',
                'content' => '/services', // Using content as link
                'status' => true,
                'sort_order' => 2,
            ],
            [
                'section' => 'hero_slider',
                'type' => 'slide',
                'title' => 'Maintenance & Services',
                'subtitle' => 'Reliable support for all industrial systems.',
                'content' => '/services', // Using content as link
                'status' => true,
                'sort_order' => 3,
            ]
        ];

        foreach ($sliders as $slider) {
            CompanySection::create($slider);
        }

        // History
        CompanySection::create([
            'section' => 'history',
            'type' => 'about',
            'title' => 'Our History',
            'content' => '<p>AR Engineering was founded with a vision to provide top-notch industrial engineering solutions. Over the years, we have successfully completed numerous projects in MEP design, fire safety, HVAC, boilers, and more.</p><p>Our commitment to innovation and excellence has made us a trusted partner for industrial clients across Bangladesh.</p>',
            'status' => true,
            'sort_order' => 1,
        ]);

        // Messages
        CompanySection::create([
            'section' => 'messages',
            'type' => 'ceo',
            'title' => 'Message from CEO',
            'subtitle' => 'CEO, AR Engineering',
            'name' => 'John Doe',
            'content' => 'We are dedicated to providing the best engineering solutions to our clients with utmost professionalism.',
            'status' => true,
            'sort_order' => 1,
        ]);

        CompanySection::create([
            'section' => 'messages',
            'type' => 'advisor',
            'title' => 'Message from Advisor',
            'subtitle' => 'Advisor, AR Engineering',
            'name' => 'Jane Smith',
            'content' => 'Innovation and precision are the key values that drive our engineering projects forward.',
            'status' => true,
            'sort_order' => 2,
        ]);
    }
}
