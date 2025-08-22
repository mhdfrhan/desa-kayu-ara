<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peta extends Model
{
    use HasFactory;

    protected $table = 'peta';

    protected $fillable = [
        'judul',
        'deskripsi',
        'alamat',
        'koordinat_lat',
        'koordinat_lng',
        'zoom_level',
        'gambar',
        'informasi_tambahan',
        'aktif'
    ];

    protected $casts = [
        'aktif' => 'boolean'
    ];

    public function scopeAktif($query)
    {
        return $query->where('aktif', true);
    }

    public function getKoordinatAttribute()
    {
        return $this->koordinat_lat . ',' . $this->koordinat_lng;
    }
}
