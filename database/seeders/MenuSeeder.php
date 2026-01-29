<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing menus
        DB::table('menus')->truncate();

        // Parent menus
        $parentMenus = [
            [
                'id' => 1,
                'name' => 'Home',
                'slug' => '/',
                'order' => 1,
                'status' => 'active',
                'type_1' => 'parent',
                'type_2' => 'link',
                'parent_id' => null,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'About Us',
                'slug' => 'about-us',
                'order' => 2,
                'status' => 'active',
                'type_1' => 'parent',
                'type_2' => 'page',
                'parent_id' => null,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Services',
                'slug' => 'services',
                'order' => 3,
                'status' => 'active',
                'type_1' => 'parent',
                'type_2' => 'page',
                'parent_id' => null,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'Gallery',
                'slug' => 'gallery',
                'order' => 4,
                'status' => 'active',
                'type_1' => 'parent',
                'type_2' => 'page',
                'parent_id' => null,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'name' => 'Team',
                'slug' => 'team',
                'order' => 5,
                'status' => 'active',
                'type_1' => 'parent',
                'type_2' => 'page',
                'parent_id' => null,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'name' => 'Blog',
                'slug' => 'blog',
                'order' => 6,
                'status' => 'active',
                'type_1' => 'parent',
                'type_2' => 'page',
                'parent_id' => null,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'name' => 'Contact',
                'slug' => 'contact',
                'order' => 7,
                'status' => 'active',
                'type_1' => 'parent',
                'type_2' => 'page',
                'parent_id' => null,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Submenu for Services
        $subMenus = [
            [
                'id' => 8,
                'name' => 'Facial Treatments',
                'slug' => 'facial-treatments',
                'order' => 1,
                'status' => 'active',
                'type_1' => 'submenu',
                'type_2' => 'page',
                'parent_id' => 3, // Services
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'name' => 'Hair Styling',
                'slug' => 'hair-styling',
                'order' => 2,
                'status' => 'active',
                'type_1' => 'submenu',
                'type_2' => 'page',
                'parent_id' => 3, // Services
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 10,
                'name' => 'Body Massage',
                'slug' => 'body-massage',
                'order' => 3,
                'status' => 'active',
                'type_1' => 'submenu',
                'type_2' => 'page',
                'parent_id' => 3, // Services
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 11,
                'name' => 'Nail Care',
                'slug' => 'nail-care',
                'order' => 4,
                'status' => 'active',
                'type_1' => 'submenu',
                'type_2' => 'page',
                'parent_id' => 3, // Services
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 12,
                'name' => 'Makeup Services',
                'slug' => 'makeup-services',
                'order' => 5,
                'status' => 'active',
                'type_1' => 'submenu',
                'type_2' => 'page',
                'parent_id' => 3, // Services
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Submenu for Gallery
            [
                'id' => 13,
                'name' => 'Before & After',
                'slug' => 'before-after',
                'order' => 1,
                'status' => 'active',
                'type_1' => 'submenu',
                'type_2' => 'page',
                'parent_id' => 4, // Gallery
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 14,
                'name' => 'Salon Interior',
                'slug' => 'salon-interior',
                'order' => 2,
                'status' => 'active',
                'type_1' => 'submenu',
                'type_2' => 'page',
                'parent_id' => 4, // Gallery
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 15,
                'name' => 'Client Photos',
                'slug' => 'client-photos',
                'order' => 3,
                'status' => 'active',
                'type_1' => 'submenu',
                'type_2' => 'page',
                'parent_id' => 4, // Gallery
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Submenu for Blog
            [
                'id' => 16,
                'name' => 'Beauty Tips',
                'slug' => 'beauty-tips',
                'order' => 1,
                'status' => 'active',
                'type_1' => 'submenu',
                'type_2' => 'page',
                'parent_id' => 6, // Blog
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 17,
                'name' => 'Latest News',
                'slug' => 'latest-news',
                'order' => 2,
                'status' => 'active',
                'type_1' => 'submenu',
                'type_2' => 'page',
                'parent_id' => 6, // Blog
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert parent menus
        DB::table('menus')->insert($parentMenus);
        
        // Insert submenus
        DB::table('menus')->insert($subMenus);

        $this->command->info('Menu seeder completed successfully!');
        $this->command->info('Created:');
        $this->command->info('- 7 Parent menus');
        $this->command->info('- 10 Submenus (5 under Services, 3 under Gallery, 2 under Blog)');
        $this->command->info('- Total: 17 menu items');
    }
}