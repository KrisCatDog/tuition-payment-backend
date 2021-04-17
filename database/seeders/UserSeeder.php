<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role_id' => 1,
            'name' => 'Administrator',
            'username' => 'admin',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ])->officer()->create();

        User::create([
            'role_id' => 2,
            'name' => 'Petugas Test',
            'username' => 'petugastest',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ])->officer()->create();

        User::create([
            'role_id' => 3,
            'name' => 'Siswa Test',
            'username' => 'siswatest',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ])->student()->create([
            'user_id' => 1,
            'class_id' => 1,
            'tuition_id' => 1,
            'nisn' => 11111111111,
            'nis' => 11111111,
            'address' => 'Alamat Test',
            'telp_number' => 874959459,
        ]);
    }
}
