<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pasien extends Model
{
    use HasFactory,HasUuids;

    protected $fillable = ['nama', 'alamat', 'keluhan', 'dokter_id'];

    public function dokter(){
        return $this->belongsTo(dokter::class, 'dokter_id');
    }
}
