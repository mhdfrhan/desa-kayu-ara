<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeri';

    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar',
        'kategori_id',
        'likes',
        'featured',
        'aktif',
        'urutan'
    ];

    protected $casts = [
        'likes' => 'integer',
        'featured' => 'boolean',
        'aktif' => 'boolean',
        'urutan' => 'integer'
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriGaleri::class, 'kategori_id');
    }

    public function scopeAktif($query)
    {
        return $query->where('aktif', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    public function scopeKategori($query, $kategoriId)
    {
        return $query->where('kategori_id', $kategoriId);
    }

    public function scopeUrutkan($query)
    {
        return $query->orderBy('urutan', 'asc');
    }

    public function scopeTerpopuler($query)
    {
        return $query->orderBy('likes', 'desc');
    }
}
