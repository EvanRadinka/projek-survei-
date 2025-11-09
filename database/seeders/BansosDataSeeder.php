<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BansosData;

class BansosDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 200; $i++) {
            BansosData::create([
                'nama' => 'Penerima Bansos ' . $i,
                'nomor_kartu_keluarga' => 'KK' . str_pad($i, 6, '0', STR_PAD_LEFT),
                'nomor_telepon' => '081234567' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'alamat' => 'Alamat ' . $i . ', Kelurahan Pekauman',
                'created_at' => now()->subDays(rand(0, 30)),
                'updated_at' => now(),
            ]);
        }
    }
}
