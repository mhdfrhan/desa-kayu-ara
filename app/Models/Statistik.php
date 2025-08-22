<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistik extends Model
{
    use HasFactory;

    protected $table = 'statistik';

    protected $fillable = [
        'kategori',
        'sub_kategori',
        'judul',
        'nilai',
        'satuan',
        'deskripsi',
        'warna',
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

    public function scopeKategori($query, $kategori)
    {
        return $query->where('kategori', $kategori);
    }

    public function scopeSubKategori($query, $subKategori)
    {
        return $query->where('sub_kategori', $subKategori);
    }

    public function scopeUrutkan($query)
    {
        return $query->orderBy('urutan', 'asc');
    }
}
