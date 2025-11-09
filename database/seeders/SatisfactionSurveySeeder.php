<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SatisfactionSurvey;

class SatisfactionSurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 200; $i++) {
            SatisfactionSurvey::create([
                'nama' => 'User ' . $i,
                'no_telepon' => '081234567' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'jenis_Pelayanan' => collect(['Pelayanan Administrasi', 'Pelayanan Kesehatan', 'Pelayanan Sosial', 'Pelayanan Pendidikan'])->random(),
                'nilai_Pelayanan' => 5, // Sangat Baik
                'nilai_petugas' => collect(['Sangat Baik', 'Baik', 'Cukup', 'Kurang', 'Sangat Kurang'])->random(),
                'created_at' => now()->subDays(rand(0, 30)),
                'updated_at' => now(),
            ]);
        }
    }
}
