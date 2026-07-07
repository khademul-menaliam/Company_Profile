<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disable foreign key constraints for clean truncation and insertion
        Schema::disableForeignKeyConstraints();
        Service::truncate();

        $services = [
            [
                'id' => 2,
                'parent_id' => null,
                'title' => 'Projects (Design, Supply & Installation)',
                'slug' => 'Projects-Design-Supply-installation',
                'short_description' => 'Projects (Design, Supply & Installation) Projects (Design, Supply & Installation)Projects (Design, Supply & Installation) Short description',
                'content' => '<p><strong>Overview: Projects (Design, Supply &amp; Installation)</strong></p><p>This service encompasses a comprehensive approach to project execution, combining expert design, efficient supply chain management, and professional installation. From initial concept development to final implementation, we manage every phase to ensure the project meets quality standards, timelines, and budget expectations.</p><p><br></p><p><strong>Design:</strong> Our design process involves understanding client needs, site-specific conditions, and functional requirements to create customized solutions. We provide detailed plans, 3D visualizations, and technical drawings, ensuring all design aspects are aligned with project goals.</p><p><br></p><p><strong>Supply:</strong> Leveraging strong relationships with trusted suppliers, we ensure the timely procurement of high-quality materials and equipment. Our supply chain management focuses on cost-efficiency, reliability, and sustainability, ensuring that the right components are delivered when and where needed.</p><p><br></p><p><strong>Installation:</strong> Our skilled installation teams work to ensure the smooth and safe installation of all components. With a focus on precision, safety, and compliance with industry standards, we guarantee a hassle-free execution. We also offer post-installation support and maintenance services to ensure long-term performance.</p><p><br></p><p>Through our integrated approach, we aim to deliver seamless project execution, from concept to completion, while providing exceptional customer satisfaction and high-quality results.</p>',
                'image' => 'images/1759673927_3a7a84c4-0a03-4b7f-8bef-b9ecf181fc51.jfif',
                'sort_order' => 2,
                'status' => true,
            ],
            [
                'id' => 3,
                'parent_id' => null,
                'title' => 'Maintenance & Services',
                'slug' => 'maintenance-services',
                'short_description' => 'Maintenance & Services Maintenance & ServicesMaintenance & Services',
                'content' => 'Maintenance & ServicesMaintenance & ServicesMaintenance & Services',
                'image' => 'images/1759674003_Gemini_Generated_Image_7dray77dray77dra.png',
                'sort_order' => 3,
                'status' => true,
            ],
            [
                'id' => 22,
                'parent_id' => 2,
                'title' => 'Compressed Air System',
                'slug' => 'compressed-air-system',
                'short_description' => 'Compressed Air System Compressed Air System Compressed Air System',
                'content' => '<p>Compressed Air SystemCompressed Air SystemCompressed Air SystemCompressed Air System</p>',
                'image' => 'storage/uploads/services/yqNcukyrvFI7aJKUv9DOOxQwAZj7W2gh2o0Tgpqu.png',
                'sort_order' => 5,
                'status' => true,
            ],
            [
                'id' => 23,
                'parent_id' => 2,
                'title' => 'Fire Protection & Detection System',
                'slug' => 'fire-protection-detection-system',
                'short_description' => 'Fire Protection & Detection SystemFire Protection & Detection System',
                'content' => '<p>Fire Protection &amp; Detection SystemFire Protection &amp; Detection System</p>',
                'image' => 'storage/uploads/services/QKQfAGVXtGZSol7wK6UZzdMJ3t3CYgjbVNpEi2h4.png',
                'sort_order' => 0,
                'status' => true,
            ],
            [
                'id' => 24,
                'parent_id' => 2,
                'title' => 'Boiler & Steam Line Solutions',
                'slug' => 'boiler-steam-line-solutions',
                'short_description' => 'Boiler & Steam Line Solutions',
                'content' => '<p>Boiler &amp; Steam Line Solutions</p>',
                'image' => 'storage/uploads/services/JDgnPM6TlBs6H7SLOzO99NYakF8gJ1VBQ9TeY2eO.png',
                'sort_order' => 3,
                'status' => true,
            ],
            [
                'id' => 25,
                'parent_id' => 2,
                'title' => 'HVAC Systems',
                'slug' => 'hvac-systems',
                'short_description' => 'HVAC Systems',
                'content' => '<p>HVAC Systems</p>',
                'image' => 'storage/uploads/services/dMmyV2yrcnoBfGar97RLXnO16ZNHHCKKYqO4yVAF.png',
                'sort_order' => 0,
                'status' => true,
            ],
            [
                'id' => 26,
                'parent_id' => 2,
                'title' => 'All Kinds of Industrial Pipe Work',
                'slug' => 'all-kinds-of-industrial-pipe-work',
                'short_description' => 'All Kinds of Industrial Pipe Work',
                'content' => '<p>All Kinds of Industrial Pipe Work</p>',
                'image' => 'storage/uploads/services/liiNnBoFAnlbxxUk2Ni2AtK5R5rnuuJQSWHmyV3u.png',
                'sort_order' => 0,
                'status' => true,
            ],
            [
                'id' => 27,
                'parent_id' => 3,
                'title' => 'All Kinds of Industrial Pumps',
                'slug' => 'all-kinds-of-industrial-pumps',
                'short_description' => 'Industrial Pumps',
                'content' => '<p>Industrial Pumps</p>',
                'image' => 'storage/uploads/services/PKFyREm3vv3FKtZfqBLEF7CvfFwLIItuqu0pAyVS.png',
                'sort_order' => 0,
                'status' => true,
            ],
            [
                'id' => 28,
                'parent_id' => 3,
                'title' => 'Electric Motors',
                'slug' => 'electric-motors',
                'short_description' => 'Electric Motors',
                'content' => '<p>Electric Motors</p>',
                'image' => 'storage/uploads/services/0WvVlhtRt59B6SQ7kmUt6Gw1k1J9bBrI2reQXaLM.png',
                'sort_order' => 0,
                'status' => true,
            ],
            [
                'id' => 29,
                'parent_id' => 3,
                'title' => 'Diesel Engine Service',
                'slug' => 'diesel-engine-service',
                'short_description' => NULL,
                'content' => '<p><br></p>',
                'image' => 'storage/uploads/services/8TaIYu8Ep6sSqw2UfHU3YdtoIuWS0FcespVpqrxh.png',
                'sort_order' => 0,
                'status' => true,
            ],
            [
                'id' => 30,
                'parent_id' => null,
                'title' => 'Consulting',
                'slug' => 'consulting',
                'short_description' => 'Expert consulting in MEP systems, ANSYS simulations, and industrial pump solutions. We optimize performance, improve efficiency, reduce costs, and deliver reliable, high-quality engineering solutions for your projects.',
                'content' => '<h3><strong class="ql-font-monospace">Consulting Services: MEP, ANSYS Simulation, and Industrial Pump Systems</strong></h3><p><span class="ql-font-monospace">At AR ENGIREEAING, we offer expert consulting services tailored to meet the unique challenges of your projects in Mechanical, Electrical, and Plumbing (MEP) systems, ANSYS simulations, and industrial pump systems. Our team combines deep technical expertise with innovative problem-solving to deliver high-performance solutions that enhance the efficiency, reliability, and safety of your operations.</span></p>',
                'image' => 'images/1762583063_con (1).jpg',
                'sort_order' => 1,
                'status' => true,
            ],
            [
                'id' => 31,
                'parent_id' => 30,
                'title' => 'MEP',
                'slug' => 'mep',
                'short_description' => NULL,
                'content' => '<p><strong>MEP Consulting:</strong></p><p> Our MEP consulting services are designed to ensure that your building or industrial facility operates at optimal efficiency. We provide comprehensive planning, design, and analysis of mechanical, electrical, and plumbing systems, offering solutions that balance sustainability, cost-effectiveness, and regulatory compliance.</p><ul><li><strong>System Design &amp; Optimization:</strong> From HVAC systems to electrical wiring, we ensure that your systems are designed for maximum performance and minimal energy consumption.</li><li><strong>Energy Efficiency &amp; Sustainability:</strong> We incorporate green design principles, helping you reduce energy costs and meet environmental standards.</li><li><strong>Compliance &amp; Safety:</strong> We ensure your MEP systems are in line with local codes and safety regulations, ensuring the safety and reliability of your infrastructure.</li></ul><p><br></p><p><br></p><h2><strong>Why Choose Us?</strong></h2><h3><strong>MEP Consulting</strong></h3><p><strong>Expert Design:</strong> Strong expertise in mechanical, electrical, and plumbing systems with practical, code-compliant solutions.</p><p> <strong>Efficient Planning:</strong> Designs focused on energy efficiency, sustainability, and cost control.</p><p> <strong>Reliable Delivery:</strong> Accurate calculations, clear documentation, and dependable project support.</p>',
                'image' => 'storage/uploads/services/OQ7SHvirCQo9uw0udf6lyhMowwhU2Iv2r79VlbPn.png',
                'sort_order' => 0,
                'status' => true,
            ],
            [
                'id' => 32,
                'parent_id' => 30,
                'title' => 'ANSYS Simulation',
                'slug' => 'ansys-simulation',
                'short_description' => NULL,
                'content' => '<p><strong>ANSYS Simulation Consulting:</strong></p><p> Leveraging the power of ANSYS simulation software, we provide high-fidelity simulations for various engineering applications. Whether it’s fluid dynamics, structural analysis, thermal management, or electromagnetic simulations, we help you predict and optimize product performance before physical prototypes are built.</p><ul><li><strong>Finite Element Analysis (FEA):</strong> Evaluate stress, strain, and structural integrity of your designs.</li><li><strong>Computational Fluid Dynamics (CFD):</strong> Model fluid flow and thermal behaviors to improve system efficiency and product design.</li><li><strong>Multiphysics Simulations:</strong> Perform coupled simulations to analyze complex interactions between different physical phenomena.</li></ul><p><br></p><p><br></p><h2><strong>Why Choose Us?</strong></h2><h3><strong>ANSYS Simulation Consulting</strong></h3><p><strong>Advanced Simulation:</strong> Deep experience in CFD, FEA, and thermal analysis using ANSYS tools.</p><p> <strong>Optimized Performance:</strong> Identify risks early, reduce prototyping costs, and improve design efficiency.</p><p> <strong>Accurate &amp; Clear Results:</strong> High-quality simulations with clear, actionable engineering insights.</p>',
                'image' => 'storage/uploads/services/z0VOcXdu5JuProyxkmzk0vpAXHWFEcWGUvnt5oRs.png',
                'sort_order' => 0,
                'status' => true,
            ],
            [
                'id' => 33,
                'parent_id' => 30,
                'title' => 'Industrial Pump System',
                'slug' => 'industrial-pump-system',
                'short_description' => NULL,
                'content' => '<p><strong>Industrial Pump System Consulting:</strong></p><p> We specialize in the design, selection, and optimization of industrial pump systems to ensure smooth operation and reduced downtime. Our expertise includes everything from process design to maintenance strategies, helping you achieve long-term efficiency and reliability.</p><ul><li><strong>Pump Selection &amp; Sizing:</strong> We assist in selecting the right pump for your system based on flow rates, pressures, and operating conditions.</li><li><strong>System Optimization:</strong> Maximize energy efficiency and reduce operational costs through system analysis and optimization.</li><li><strong>Troubleshooting &amp; Maintenance Plans:</strong> We offer solutions to common pump-related issues and develop maintenance strategies to ensure continuous performance.</li></ul><h2><br></h2><h2>Why Choose Us?</h2><h3><strong>Industrial Pump System Consulting</strong></h3><p><strong>System Expertise:</strong> Strong knowledge in pump selection, sizing, and hydraulic system design.</p><p><strong>Performance Optimization:</strong> Improve efficiency, reduce energy consumption, and extend equipment life.</p><p><strong>Operational Reliability:</strong> Proven solutions for troubleshooting, stability, and long-term operation.</p>',
                'image' => 'storage/uploads/services/3AOcCYcdB2Enm032ZkLDaqSuNtv0TINfaHrKQ2ZG.png',
                'sort_order' => 0,
                'status' => true,
            ],
            [
                'id' => 34,
                'parent_id' => 30,
                'title' => 'Flatbed Gain dryer System',
                'slug' => 'flatbed-gain-dryer-system',
                'short_description' => 'Flatbed Gain dryer System',
                'content' => '<p>Flatbed Gain dryer System</p>',
                'image' => 'storage/uploads/services/2UXbjxdmtF5W3fFA4lVuXxCyt5amBbted1iXbgJH.png',
                'sort_order' => 0,
                'status' => true,
            ],
            [
                'id' => 35,
                'parent_id' => 30,
                'title' => 'Natural ventilation System',
                'slug' => 'natural-ventilation-system',
                'short_description' => 'Natural ventilation System',
                'content' => '<p>Natural ventilation System</p>',
                'image' => 'storage/uploads/services/4TUhHkWHy95LOuZnZIioMmY8p3SoIXp4OiZxlkr1.png',
                'sort_order' => 0,
                'status' => true,
            ],
            [
                'id' => 36,
                'parent_id' => 3,
                'title' => 'Compressor',
                'slug' => 'compressor',
                'short_description' => 'Compressor',
                'content' => '<p>Compressor</p>',
                'image' => 'storage/uploads/services/imwdNhqeydOO0yOy9RAkokxGkEIoi6I1qT1pQRmE.png',
                'sort_order' => 0,
                'status' => true,
            ],
            [
                'id' => 37,
                'parent_id' => 3,
                'title' => 'Generator',
                'slug' => 'generator',
                'short_description' => 'Generator',
                'content' => '<p>Generator</p>',
                'image' => 'storage/uploads/services/5Qvga7ruTgdKHebrHIlKdjsZ5uxEE9CxgWcAuZvJ.png',
                'sort_order' => 0,
                'status' => true,
            ],
        ];

        foreach ($services as $serviceData) {
            Service::create($serviceData);
        }

        Schema::enableForeignKeyConstraints();
    }
}
