<?php

namespace Database\Seeders;

use App\Models\CompanySection;
use Illuminate\Database\Seeder;

class AboutPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Quality Policy
        CompanySection::updateOrCreate(
            ['section' => 'about_page', 'type' => 'quality_policy'],
            [
                'title' => 'Quality Policy',
                'status' => true,
                'content' => '<p>We strictly adhere to international engineering codes and standards. Our quality assurance framework guarantees zero compromise on material integrity and project execution safety.</p>'
            ]
        );

        // Vision
        CompanySection::updateOrCreate(
            ['section' => 'about_page', 'type' => 'vision'],
            [
                'title' => 'Our Vision',
                'status' => true,
                'content' => '<p>To become the premier engineering solution provider in Bangladesh, recognized for our technical excellence, innovative approaches, and unyielding commitment to safety and quality.</p>'
            ]
        );

        // Mission
        CompanySection::updateOrCreate(
            ['section' => 'about_page', 'type' => 'mission'],
            [
                'title' => 'Our Mission',
                'status' => true,
                'content' => '<p>To deliver reliable, high-quality, and cost-effective industrial engineering solutions that empower our clients to achieve maximum operational efficiency and sustainable growth.</p>'
            ]
        );

        // Philosophy
        CompanySection::updateOrCreate(
            ['section' => 'about_page', 'type' => 'philosophy'],
            [
                'title' => 'Our Philosophy',
                'subtitle' => 'Built on Excellence',
                'status' => true,
                'content' => '<p>We believe in sustainable engineering, continuous improvement, and customer-centric solutions. Our philosophy emphasizes integrity, innovation, and excellence in every project we undertake.</p>'
            ]
        );
        
        $this->command->info('About Page sections seeded successfully.');
    }
}
