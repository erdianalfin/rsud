<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'admin'],
            ['name' => 'patient'],
            ['name' => 'doctor'],
            ['name' => 'apoteker']
        ];

        foreach($roles as $role) {
            Role::create($role);
        }
    }
}
