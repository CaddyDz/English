<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        create('English\User', [
                    'username' => 'Caddy',
                    'email'    => 'salim@caddydz.me',
                    'password' => bcrypt('cicada'),
                ]);
        $tags = factory('English\Tag', 12)->create();
        $statuses = factory('English\Status', 50)->create();
        // Let's find a way to attach some tags to each status
        $statuses->each(function ($status) {
            factory('English\Comment', 100)->create([
                        'status_id' => $status->id,
                    ]);
            $status->tags()->attach(rand(1, 4));
            $status->tags()->attach(rand(5, 8));
            $status->tags()->attach(rand(9, 12));
        });
    }
}
