<?php

namespace Database\Seeders;

use App\Models\HomepageSection;
use Illuminate\Database\Seeder;

class HomepageSectionSeeder extends Seeder
{
    public function run()
    {
        HomepageSection::truncate();

        HomepageSection::create([
            'section_key' => 'hero',
            'title' => 'Intelligent Robotics for the Modern Home',
            'content' => 'Constraal builds reliable, safe, and scalable intelligent systems for homes, appliances, and industrial environments.',
            'order' => 1,
            'data' => json_encode([
                'image' => '/images/hero-home.jpg',
                'cta' => 'Explore Our Technology',
                'cta_link' => '/technology',
            ]),
        ]);

        HomepageSection::create([
            'section_key' => 'future_of_home',
            'title' => 'The Future of the Home',
            'content' => 'Intelligent living environments, robotics integrated into daily life, and appliances evolving into interconnected systems.',
            'order' => 2,
            'data' => json_encode(null),
        ]);

        HomepageSection::create([
            'section_key' => 'technology_core',
            'title' => 'Constraal Technology Core',
            'content' => 'Our core capabilities that power intelligent systems.',
            'order' => 3,
            'data' => json_encode([
                'features' => [
                    'Embedded Intelligence',
                    'Human-Aware Robotics',
                    'Safety-First Design',
                    'Energy Efficiency',
                ],
            ]),
        ]);

        HomepageSection::create([
            'section_key' => 'where_technology_lives',
            'title' => 'Where Technology Lives',
            'content' => 'Robotics · Home Systems · Appliances',
            'order' => 4,
            'data' => json_encode(null),
        ]);

        HomepageSection::create([
            'section_key' => 'safety_trust',
            'title' => 'Safety & Trust',
            'content' => 'Designed for human environments with fail-safes, privacy-preserving systems, and industrial-grade reliability.',
            'order' => 5,
            'data' => json_encode(null),
        ]);

        HomepageSection::create([
            'section_key' => 'built_by_engineers',
            'title' => 'Built by Engineers',
            'content' => 'R&D culture, embedded systems expertise, and long-term engineering focus.',
            'order' => 6,
            'data' => json_encode(null),
        ]);

        HomepageSection::create([
            'section_key' => 'join_us',
            'title' => 'Join Us',
            'content' => 'Be part of the future of intelligent systems.',
            'order' => 7,
            'data' => json_encode([
                'ctas' => [
                    ['label' => 'Careers', 'link' => '/careers'],
                    ['label' => 'Partner with Constraal', 'link' => '/contact'],
                ],
            ]),
        ]);
    }
}
