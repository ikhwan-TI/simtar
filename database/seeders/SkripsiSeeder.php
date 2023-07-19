<?php

namespace Database\Seeders;

use App\Models\Skripsi;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class SkripsiSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Skripsi::create([
      'mhs_id' => 9,
      'judul' => 'Analisis dan Implementasi Algoritma Pencarian Optimal pada Sistem Pemetaan Lokasi Menggunakan Teknologi GPS',
      'pembimbing1_id' => 2,
      'pembimbing2_id' => 2,
      // 'tgl_ujian' => '2023-04-10',
      'tgl_judul' => '2022-04-11',
      'file_proposal' => null,
      'file_hasil' => null,
      'file_skripsi' => null,
    ]);
    Skripsi::create([
      'mhs_id' => 10,
      'judul' => 'Penerapan Algoritma Data Mining untuk Prediksi Kinerja Mahasiswa pada Sistem E-Learning',
      'pembimbing1_id' => 2,
      'pembimbing2_id' => 2,
      // 'tgl_ujian' => '2023-04-10',
      'tgl_judul' => '2022-04-11',
      'file_proposal' => null,
      'file_hasil' => null,
      'file_skripsi' => null,
    ]);
  }
}
