<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProdukDesa extends Model
{
    use HasFactory;

    protected $table = 'produk_desa';

    protected $fillable = [
        'nama',
        'slug',
        'deskripsi',
        'gambar',
        'kategori_id',
        'harga',
        'satuan',
        'harga_diskon',
        'persentase_diskon',
        'nomor_wa',
        'pesan_wa',
        'rating',
        'terjual',
        'featured',
        'best_seller',
        'aktif',
        'urutan'
    ];

    protected $casts = [
        'harga' => 'decimal:2',
        'harga_diskon' => 'decimal:2',
        'persentase_diskon' => 'integer',
        'terjual' => 'integer',
        'featured' => 'boolean',
        'best_seller' => 'boolean',
        'aktif' => 'boolean',
        'urutan' => 'integer'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($produk) {
            if (empty($produk->slug)) {
                $produk->slug = Str::slug($produk->nama);
            }
        });
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriProduk::class, 'kategori_id');
    }

    public function scopeAktif($query)
    {
        return $query->where('aktif', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    public function scopeBestSeller($query)
    {
        return $query->where('best_seller', true);
    }

    public function scopeKategori($query, $kategoriId)
    {
        return $query->where('kategori_id', $kategoriId);
    }

    public function scopeUrutkan($query)
    {
        return $query->orderBy('urutan', 'asc');
    }

    public function getHargaFormattedAttribute()
    {
        return 'Rp ' . number_format($this->harga, 0, ',', '.');
    }

    public function getHargaDiskonFormattedAttribute()
    {
        if ($this->harga_diskon) {
            return 'Rp ' . number_format($this->harga_diskon, 0, ',', '.');
        }
        return null;
    }

    public function getPesanWaFormattedAttribute()
    {
        return str_replace(
            ['{nama}', '{harga}', '{satuan}'],
            [$this->nama, $this->harga_formatted, $this->satuan],
            $this->pesan_wa
        );
    }
}
