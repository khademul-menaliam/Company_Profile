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

        // About Us (History)
        CompanySection::create([
            'section' => 'history',
            'type' => 'about',
            'title' => 'About Us',
            'content' => '<p><strong>AR Engineering</strong> was founded in <strong>[Year]</strong> with a commitment to delivering reliable and innovative engineering solutions across Bangladesh. We specialize in <strong>Building Information Modeling (BIM), MEP Engineering, HVAC systems, Fire & Life Safety solutions, Industrial Pump Services,</strong> and technical engineering consultancy for industrial, commercial, and residential projects.</p><p>With a focus on quality, safety, and professional integrity, our experienced team provides practical, cost-effective solutions that help clients complete their projects with confidence.</p>',
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
        // About Page - About Us
        CompanySection::create([
            'section' => 'about_page',
            'type' => 'about_us',
            'title' => 'About Us',
            'content' => '<p>Founded in <strong>[Year]</strong>, <strong>AR Engineering</strong> was established with a vision to provide reliable, innovative, and high-quality engineering solutions for industrial, commercial, and residential projects. Since our inception, we have been committed to delivering engineering services that combine technical expertise, practical solutions, and industry best practices.</p><p>Today, AR Engineering provides comprehensive engineering services across multiple disciplines, helping clients successfully plan, design, install, and maintain critical engineering systems. Our expertise includes:</p><ul><li>Building Information Modeling (BIM)</li><li>Mechanical, Electrical & Plumbing (MEP) Engineering</li><li>HVAC System Design & Installation</li><li>Fire Detection, Fire Protection & Life Safety Systems</li><li>Industrial Pump Supply, Installation & Maintenance</li><li>Engineering Design & Technical Consultancy</li><li>Operation, Maintenance & Engineering Support</li></ul><p>Our team consists of experienced engineers, designers, and technical professionals who work collaboratively to deliver solutions that are efficient, cost-effective, and tailored to each client\'s unique requirements. Every project is approached with careful planning, technical precision, and a strong commitment to quality.</p>',
            'status' => true,
            'sort_order' => 1,
        ]);

        // About Page - Core Values
        CompanySection::create([
            'section' => 'about_page',
            'type' => 'core_values',
            'title' => 'Our Core Values',
            'content' => '<ul><li>Integrity and professionalism</li><li>Engineering excellence</li><li>Quality and reliability</li><li>Health, Safety & Environmental responsibility</li><li>Innovation and continuous improvement</li><li>Customer-focused service</li><li>Timely project delivery</li></ul><p>At AR Engineering, we believe that strong client relationships are built on trust, transparency, and consistent performance. Whether supporting a new construction project, upgrading existing facilities, or providing specialized engineering services, we are committed to delivering solutions that meet the highest standards of quality, safety, and performance.</p>',
            'status' => true,
            'sort_order' => 2,
        ]);
    }
}
