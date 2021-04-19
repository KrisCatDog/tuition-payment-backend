<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Tuition::factory(100)->create();
        $this->call([
            MajorSeeder::class,
            ClassSeeder::class,
            TuitionSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
            UserSeeder::class,
            PermissionRoleSeeder::class,
        ]);
        // \App\Models\Payment::factory(100)->create();
    }
}
