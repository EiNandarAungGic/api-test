<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $post = [
            [
                'title'       => 'Post I',
                'content'      => 'This is post 1 content',
            ],
            [
                'title'       => 'Post II',
                'content'      => 'This is post 2 content',
            ],
            [
                'title'       => 'Post III',
                'content'      => 'This is post 3 content',
            ],
            [
                'title'       => 'Post IV',
                'content'      => 'This is post 4 content',
            ],
            [
                'title'       => 'Post V',
                'content'      => 'This is post 5 content',
            ],
            [
                'title'       => 'Post VI',
                'content'      => 'This is post 6 content',
            ],
        ];

        foreach ($post as $key => $value) {
            Post::create($value);
        }
    }
}
