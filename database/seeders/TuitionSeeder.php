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
            'year' => 2021,
            'amount' => 300000,
        ]);
    }
}
