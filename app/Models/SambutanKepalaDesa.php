<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SambutanKepalaDesa extends Model
{
    use HasFactory;

    protected $table = 'sambutan_kepala_desa';

    protected $fillable = [
        'struktur_organisasi_id',
        'sambutan',
        'quote',
        'konten_lengkap',
        'aktif'
    ];

    protected $casts = [
        'aktif' => 'boolean',
    ];

    /**
     * Get the struktur organisasi that owns the sambutan
     */
    public function strukturOrganisasi()
    {
        return $this->belongsTo(StrukturOrganisasi::class, 'struktur_organisasi_id');
    }

    /**
     * Scope untuk sambutan yang aktif
     */
    public function scopeAktif($query)
    {
        return $query->where('aktif', true);
    }

    /**
     * Scope untuk sambutan yang tidak aktif
     */
    public function scopeNonaktif($query)
    {
        return $query->where('aktif', false);
    }

    /**
     * Get the sambutan's short sambutan (first 100 characters)
     */
    public function getSambutanSingkatAttribute()
    {
        return Str::limit($this->sambutan, 100);
    }

    /**
     * Get the sambutan's short quote (first 50 characters)
     */
    public function getQuoteSingkatAttribute()
    {
        return $this->quote ? Str::limit($this->quote, 50) : null;
    }

    /**
     * Get nama kepala desa dari relasi
     */
    public function getNamaAttribute()
    {
        return $this->strukturOrganisasi->nama ?? null;
    }

    /**
     * Get jabatan kepala desa dari relasi
     */
    public function getJabatanAttribute()
    {
        return $this->strukturOrganisasi->jabatan ?? null;
    }

    /**
     * Get periode kepala desa dari relasi
     */
    public function getPeriodeAttribute()
    {
        return $this->strukturOrganisasi->periode ?? null;
    }

    /**
     * Get foto kepala desa dari relasi
     */
    public function getFotoAttribute()
    {
        return $this->strukturOrganisasi->foto ?? null;
    }
}
