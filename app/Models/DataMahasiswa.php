<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataMahasiswa extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'data_mahasiswa';
    protected $guarded = [];

    // relasi 1:1 data_mahasiswa ke user ++++
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
