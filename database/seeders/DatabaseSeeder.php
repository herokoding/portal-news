<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Models\Role;
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

        // Manual Seeding

        Role::factory(2)->create();

        // Category::create([
        //     'name' => "Sport News",
        //     'slug' => 'sport-news'
        // ]);

        User::factory(5)->create();
        // Category::factory()->create(['name' => "Sport News", 'slug' => 'sport-news', 'created_at' => now()->subDays(2), 'updated_at' => now()->subDays(2)]);
        // Category::factory()->create(['name' => "General News", 'slug' => 'general-news', 'created_at' => now()->subDays(1), 'updated_at' => now()->subDays(1)]);
        // Category::factory()->create(['name' => "Business News", 'slug' => 'business-news', 'created_at' => now()->subDays(3), 'updated_at' => now()->subDays(3)]);
        // Category::factory()->create(['name' => "Entertainment News", 'slug' => 'entertainment-news', 'created_at' => now()->subDays(4), 'updated_at' => now()->subDays(4)]);
        // Post::factory(15)->create();
    }
}
