<?php

declare(strict_types=1);

use English\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        create(User::class, [
            'username' => 'Caddy',
            'email'    => 'caddy@salimdj.me',
            'password' => bcrypt('password'),
        ]);
    }
}
