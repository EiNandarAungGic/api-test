<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comment = [
            [
                'comment'       => 'This is comment 1',
            ],
            [
                'comment'       => 'This is comment 2',
            ],
            [
                'comment'       => 'This is comment 3',
            ],
            [
                'comment'       => 'This is comment 4',
            ],
        ];

        foreach ($comment as $key => $value) {
            Comment::create($value);
        }
    }
}
