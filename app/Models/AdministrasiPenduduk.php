<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdministrasiPenduduk extends Model
{
    use HasFactory;

    protected $table = 'administrasi_penduduk';

    protected $fillable = [
        'jenis',
        'nilai',
        'satuan',
        'deskripsi',
        'warna_icon',
        'icon',
        'urutan',
        'aktif'
    ];

    protected $casts = [
        'urutan' => 'integer',
        'aktif' => 'boolean'
    ];

    public function scopeAktif($query)
    {
        return $query->where('aktif', true);
    }

    public function scopeUrutkan($query)
    {
        return $query->orderBy('urutan', 'asc');
    }

    public function scopeKategori($query, $kategori)
    {
        return $query->where('jenis', $kategori);
    }
}
