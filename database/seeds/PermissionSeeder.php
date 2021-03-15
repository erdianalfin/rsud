<?php

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ['name' => 'all'], // 1
            ['name' => 'admin'], // 2
            ['name' => 'patient'], // 3
            ['name' => 'doctor'], // 4
            ['name' => 'apoteker'], // 5
            ['name' => 'admin|patient'], // 6
            ['name' => 'admin|doctor'], // 7
            ['name' => 'admin|apoteker'], // 8
            ['name' => 'admin|doctor|apoteker'], // 9
            ['name' => 'patient|doctor'], // 10
            ['name' => 'patient|apoteker'], // 11
            ['name' => 'patient|doctor|apoteker'], // 12
            ['name' => 'doctor|apoteker'] // 13
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }

        $admin = Role::where('name', 'admin')->first();
        $admin->permissions()->attach([1, 2, 6, 7, 8, 9]);

        $patient = Role::where('name', 'patient')->first();
        $patient->permissions()->attach([1, 3, 6, 10, 11, 12]);

        $doctor = Role::where('name', 'doctor')->first();
        $doctor->permissions()->attach([1, 4, 6, 7, 9, 10, 12, 13]);

        $apoteker = Role::where('name', 'apoteker')->first();
        $apoteker->permissions()->attach([1, 5, 8, 9, 11, 12, 13]);
    }
}
