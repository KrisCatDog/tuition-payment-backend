<?php

namespace Database\Seeders;

use App\Models\IClass;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IClass::create([
            'major_id' => 1,
            'nama_kelas' => 'XI'
        ]);
    }
}
