<?php

namespace Database\Seeders;

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
        $actions = ['create', 'view', 'viewAny', 'update', 'delete'];
        $modules = ['student', 'officer', 'class', 'tuition'];

        $permissions = [];

        foreach ($actions as $action) {
            foreach ($modules as $module) {
                $permission = ['name' => "$action $module", 'created_at' => now(), 'updated_at' => now()];

                array_push($permissions, $permission);
            }
        }

        Permission::insert($permissions);
    }
}
