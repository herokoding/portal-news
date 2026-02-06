<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Menu_role;
use App\Models\Role;
use App\Models\Submenu;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Ensure RoleFactory exists

        Role::insert([
            [
                'role_name' => 'Admin',
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2)
            ],
            [
                'role_name' => 'Writer',
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2)
            ],
            [
                'role_name' => 'Editor',
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2)
            ],
        ]);

        Category::create([
            'name' => "Sport News",
            'slug' => 'sport-news',
            'created_at' => now()->subDays(2),
            'updated_at' => now()->subDays(2),
        ]);

        Category::create([
            'name' => "General News",
            'slug' => 'general-news',
            'created_at' => now()->subDays(1),
            'updated_at' => now()->subDays(1),
        ]);

        Category::create([
            'name' => "Business News",
            'slug' => 'business-news',
            'created_at' => now()->subDays(3),
            'updated_at' => now()->subDays(3),
        ]);

        Category::create([
            'name' => "Entertainment News",
            'slug' => 'entertainment-news',
            'created_at' => now()->subDays(4),
            'updated_at' => now()->subDays(4),
        ]);

        $dashboard = Menu::create([
            'menu_name' => 'Dashboard',
            'slug' => 'dashboard',
            'icon' => 'fas fa-tachometer-alt',
            'created_at' => now()->subDays(2),
            'updated_at' => now()->subDays(2)
        ]);

        $posts = Menu::create([
            'menu_name' => 'Posts',
            'slug' => 'posts',
            'icon' => 'fas fa-newspaper',
            'created_at' => now()->subDays(2),
            'updated_at' => now()->subDays(2)
        ]);

        $categories = Menu::create([
            'menu_name' => 'Categories',
            'slug' => 'categories',
            'icon' => 'fas fa-list',
            'created_at' => now()->subDays(2),
            'updated_at' => now()->subDays(2)
        ]);

        $users = Menu::create([
            'menu_name' => 'Users',
            'slug' => 'users',
            'icon' => 'fas fa-users',
            'created_at' => now()->subDays(2),
            'updated_at' => now()->subDays(2)
        ]);

        $profile = Menu::create([
            'menu_name' => 'Profile',
            'slug' => 'profile',
            'icon' => 'fas fa-user',
            'created_at' => now()->subDays(2),
            'updated_at' => now()->subDays(2)
        ]);

        Submenu::insert([
            [
                'menu_id' => $posts->id,
                'submenu_name' => 'All Posts',
                'slug' => 'all-posts',
                'icon' => 'fas fa-newspaper',
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2)
            ],
            [
                'menu_id' => $categories->id,
                'submenu_name' => 'All Categories',
                'slug' => 'all-categories',
                'icon' => 'fas fa-list',
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2)
            ],
            [
                'menu_id' => $users->id,
                'submenu_name' => 'All Users',
                'slug' => 'all-users',
                'icon' => 'fas fa-users',
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2)
            ],
            [
                'menu_id' => $profile->id,
                'submenu_name' => 'ViewProfile',
                'slug' => 'profile',
                'icon' => 'fas fa-user',
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2)
            ],
        ]);

        Menu_role::insert([
            [
                'role_id' => 1,
                'menu_id' => $dashboard->id,
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2)
            ],
            [
                'role_id' => 1,
                'menu_id' => $posts->id,
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2)
            ],
            [
                'role_id' => 1,
                'menu_id' => $categories->id,
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2)
            ],
            [
                'role_id' => 1,
                'menu_id' => $users->id,
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2)
            ],
            [
                'role_id' => 1,
                'menu_id' => $profile->id,
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2)
            ],
            [
                'role_id' => 2,
                'menu_id' => $dashboard->id,
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2)
            ],
            [
                'role_id' => 2,
                'menu_id' => $posts->id,
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2)
            ],
            [
                'role_id' => 2,
                'menu_id' => $profile->id,
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2)
            ]
        ]);

    }
}
