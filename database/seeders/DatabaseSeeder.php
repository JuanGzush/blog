<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

use Illuminate\Support\Facades\Storage;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        /*  User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        */
        Storage::deleteDirectory("public/posts"); 
        Storage::makeDirectory("public/posts"); //creará la carpeta posts en public/storage
        $this->call(UserSeeder::class);
        Category::factory(4)->create();
        Tag::factory(8)->create();
        $this->call(PostSeeder::class);
    }
}
