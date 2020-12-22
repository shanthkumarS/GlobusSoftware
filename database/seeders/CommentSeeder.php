<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comments = [
            [
                'comment' => 'This blog looks soo good',
                'user_id' => 1,
                'post_id' => 1
            ],
            [
                'comment' => 'Awsome blog !!!!!!',
                'user_id' => 2,
                'post_id' => 1
            ],
            [
                'comment' => 'I hate this shit',
                'user_id' => 3,
                'post_id' => 1
            ],
            [
                'comment' => 'This blog looks soo good',
                'user_id' => 1,
                'post_id' => 2
            ],
            [
                'comment' => 'Awsome blog !!!!!!',
                'user_id' => 2,
                'post_id' => 2
            ],
            [
                'comment' => 'I dont like this',
                'user_id' => 3,
                'post_id' => 2
            ],
            [
                'comment' => 'This blog looks soo good',
                'user_id' => 1,
                'post_id' => 3
            ],
            [
                'comment' => 'Awsome blog !!!!!!',
                'user_id' => 2,
                'post_id' => 3
            ],
            [
                'comment' => 'I hate this shit',
                'user_id' => 3,
                'post_id' => 3
            ],
            
        ];
  
        foreach ($comments as $key => $value) {
            Comment::create($value);
        }
    }
}
