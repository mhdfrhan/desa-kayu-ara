<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeri';

    protected $fillable = [
        'judul',
        'slug',
        'deskripsi',
        'gambar',
        'kategori_id',
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

        static::creating(function ($galeri) {
            if (empty($galeri->slug)) {
                $galeri->slug = Str::slug($galeri->judul);
            }
        });

        static::updating(function ($galeri) {
            if ($galeri->isDirty('judul')) {
                $galeri->slug = Str::slug($galeri->judul);
            }
        });
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriGaleri::class, 'kategori_id');
    }

    public function galeriLikes()
    {
        return $this->hasMany(GaleriLike::class);
    }

    public function getLikesCountAttribute()
    {
        return $this->galeriLikes()->count();
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
