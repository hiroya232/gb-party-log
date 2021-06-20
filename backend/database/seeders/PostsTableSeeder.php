<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 3; $i++) {
            Post::create([
                'user_id' => $i + 1,
                'title' => 'title'.$i + 1,
                'body' => 'body'.$i + 1
            ]);
        }
    }
}
