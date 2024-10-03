<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rawat extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = ["tanggal_masuk","tanggal_keluar", "ruang_id","pasien_id"];

    public function ruang(){
        return $this->belongsTo(ruang::class, 'ruang_id');
    }
    public function pasien(){
        return $this->belongsTo(pasien::class, 'pasien_id');
    }
}
