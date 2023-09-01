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
                'comment_id'  => 1,
            ],
            [
                'title'       => 'Post II',
                'content'      => 'This is post 2 content',
                'comment_id'  => 2,
            ],
            [
                'title'       => 'Post III',
                'content'      => 'This is post 3 content',
                'comment_id'  => 2,
            ],
            [
                'title'       => 'Post IV',
                'content'      => 'This is post 4 content',
                'comment_id'  => 3,
            ],
            [
                'title'       => 'Post V',
                'content'      => 'This is post 5 content',
                'comment_id'  => 4,
            ],
        ];

        foreach ($post as $key => $value) {
            Post::create($value);
        }
    }
}
