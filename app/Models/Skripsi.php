<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skripsi extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    use HasFactory;

    // relasi 1:1 skripsi ke user mahasiswa ++++
    public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'mhs_id');
    }

    // relasi skripsi ke users pembimbing 1 ++++
    public function pembimbing_1()
    {
        return $this->belongsTo(User::class, 'pembimbing1_id');
    }

    // relasi skripsi ke users pembimbing 2 ++++
    public function pembimbing_2()
    {
        return $this->belongsTo(User::class, 'pembimbing2_id');
    }
}
