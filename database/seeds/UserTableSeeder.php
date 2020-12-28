<?php

use English\Models\User;
use English\Services\UserService;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $service = app(UserService::class);
        // Check if users already exists
        if (!User::where('name', 'admin')->first() && !User::where('name', 'caddy')->first()) {
            $admin = User::create([
                'name'     => 'Admin',
                'email'    => 'admin@example.com',
                'password' => bcrypt('admin'),
            ]);
            $caddy = User::create([
                'name'     => 'Caddy',
                'email'    => 'caddy@english.dz',
                'password' => bcrypt('password'),
            ]);
            $service->create($admin, 'admin', 'admin', false);
            $service->create($caddy, 'password', 'member', false);
        }
    }
}
