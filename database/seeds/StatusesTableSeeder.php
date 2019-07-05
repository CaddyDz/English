<?php

use English\Comment;
use English\Status;
use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Status::class, 50)->create()->each(function ($status) {
            factory(Comment::class, 20)->create([
                'status_id' => $status->id,
            ]);
            $status->tags()->attach(rand(1, 4));
            $status->tags()->attach(rand(5, 8));
            $status->tags()->attach(rand(9, 12));
        });
    }
}
