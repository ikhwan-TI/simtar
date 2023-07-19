<?php

namespace Database\Seeders;

use App\Models\DataMahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataMahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DataMahasiswa::create([
            'user_id' => 7,
        ]);
        DataMahasiswa::create([
            'user_id' => 8,
        ]);
    }
}
