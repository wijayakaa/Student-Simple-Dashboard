<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Kelas;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Student::factory(30)->create();
        // \App\Models\Kelas::factory(4)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Kelas::create([
            'kelas_siswa' => '10 PPLG 1',
        ]);

        Kelas::create([
            'kelas_siswa' => '10 PPLG 2',
        ]);

        Kelas::create([
            'kelas_siswa' => '11 PPLG 1',
        ]);

        Kelas::create([
            'kelas_siswa' => '11 PPLG 2',
        ]);
    }
}