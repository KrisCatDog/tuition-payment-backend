<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::where('name', 'administrator')->first();
        $adminRole->permissions()->attach([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24]);

        $petugasRole = Role::where('name', 'petugas')->first();
        $petugasRole->permissions()->attach([21, 22, 23]);

        $siswaRole = Role::where('name', 'siswa')->first();
        $siswaRole->permissions()->attach([22, 23]);
    }
}
