<?php

use English\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Role::where('name', 'member')->first()) {
            Role::create([
                'name'  => 'member',
                'label' => 'Member',
            ]);
            Role::create([
                'name'  => 'admin',
                'label' => 'Admin',
            ]);
        }
    }
}
