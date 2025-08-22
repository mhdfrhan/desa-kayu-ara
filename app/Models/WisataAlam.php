<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class WisataAlam extends Model
{
    use HasFactory;

    protected $table = 'wisata_alam';

    protected $fillable = [
        'nama',
        'slug',
        'deskripsi',
        'gambar',
        'kategori',
        'lokasi',
        'fasilitas',
        'cara_menuju',
        'jam_operasional',
        'harga_tiket',
        'kontak',
        'featured',
        'aktif',
        'urutan'
    ];

    protected $casts = [
        'featured' => 'boolean',
        'aktif' => 'boolean',
        'urutan' => 'integer'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($wisata) {
            if (empty($wisata->slug)) {
                $wisata->slug = Str::slug($wisata->nama);
            }
        });
    }

    public function scopeAktif($query)
    {
        return $query->where('aktif', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    public function scopeKategori($query, $kategori)
    {
        return $query->where('kategori', $kategori);
    }

    public function scopeUrutkan($query)
    {
        return $query->orderBy('urutan', 'asc');
    }
}
