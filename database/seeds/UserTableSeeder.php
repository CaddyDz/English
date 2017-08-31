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
        
        if (!User::where('name', 'admin')->first()) {
            $user = User::create([
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('admin'),
            ]);
            
            $service->create($user, 'admin', 'admin', false);
        }

    }
}
