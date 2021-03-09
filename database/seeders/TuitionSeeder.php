<?php

namespace Database\Seeders;

use App\Models\Tuition;
use Illuminate\Database\Seeder;

class TuitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tuition::create([
            'tahun' => 2021,
            'nominal' => 300000,
        ]);
    }
}
