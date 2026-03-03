<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Section;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections = [
            [
                'name' => 'Hero Section',
                'unique_section' => 'hero_section',
                'order' => 1,
                'is_active' => true,
                'content' => [
                    'title' => 'Welcome to Our Website',
                    'subtitle' => 'Your trusted partner',
                    'button_text' => 'Learn More',
                    'button_link' => '/about',
                    'background_image' => '/images/hero-bg.jpg',
                ],
            ],
            [
                'name' => 'Services Section',
                'unique_section' => 'services_section',
                'order' => 2,
                'is_active' => true,
                'content' => [
                    'title' => 'Our Services',
                    'description' => 'We provide the best services',
                    'services' => [
                        [
                            'icon' => 'flaticon-makeup',
                            'title' => 'Service 1',
                            'description' => 'Description for service 1',
                        ],
                        [
                            'icon' => 'flaticon-woman-1',
                            'title' => 'Service 2',
                            'description' => 'Description for service 2',
                        ],
                    ],
                ],
            ],
            [
                'name' => 'About Section',
                'unique_section' => 'about_section',
                'order' => 3,
                'is_active' => true,
                'content' => [
                    'title' => 'About Us',
                    'description' => 'Learn more about our company',
                    'image' => '/images/about.jpg',
                    'features' => [
                        'Expert Team',
                        'Quality Service',
                        'Professional Consultation',
                    ],
                ],
            ],
            [
                'name' => 'Team Section',
                'unique_section' => 'team_section',
                'order' => 4,
                'is_active' => true,
                'content' => [
                    'title' => 'Our Expert Team',
                    'description' => 'Meet our professional team',
                    'members' => [
                        [
                            'name' => 'John Doe',
                            'position' => 'CEO',
                            'image' => '/images/team1.jpg',
                        ],
                        [
                            'name' => 'Jane Smith',
                            'position' => 'CTO',
                            'image' => '/images/team2.jpg',
                        ],
                    ],
                ],
            ],
            [
                'name' => 'CTA Section',
                'unique_section' => 'cta_section',
                'order' => 5,
                'is_active' => true,
                'content' => [
                    'title' => 'Ready to Get Started?',
                    'description' => 'Contact us today for a free consultation',
                    'button_text' => 'Contact Us',
                    'button_link' => '/contact',
                    'whatsapp_number' => '6285220710909',
                ],
            ],
        ];

        foreach ($sections as $section) {
            Section::create($section);
        }
    }
}
