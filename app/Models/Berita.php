<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';

    protected $fillable = [
        'judul',
        'slug',
        'ringkasan',
        'konten',
        'gambar',
        'kategori_id',
        'featured',
        'aktif',
        'tanggal_publikasi'
    ];

    public $timestamps = true;

    protected $casts = [
        'featured' => 'boolean',
        'aktif' => 'boolean',
        'tanggal_publikasi' => 'datetime'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($berita) {
            if (empty($berita->slug)) {
                $berita->slug = Str::slug($berita->judul);
            }
        });

        static::updating(function ($berita) {
            if ($berita->isDirty('judul')) {
                $berita->slug = Str::slug($berita->judul);
            }
        });
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriBerita::class, 'kategori_id');
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

    public function scopeTerbaru($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function scopeTerpublikasi($query)
    {
        return $query->where('tanggal_publikasi', '<=', now());
    }
}
