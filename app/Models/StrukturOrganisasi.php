<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrukturOrganisasi extends Model
{
    use HasFactory;

    protected $table = 'struktur_organisasi';

    protected $fillable = [
        'nama',
        'jabatan',
        'periode',
        'foto',
        'deskripsi_tugas',
        'warna_badge',
        'urutan',
        'aktif'
    ];

    protected $casts = [
        'aktif' => 'boolean',
        'urutan' => 'integer',
    ];

    /**
     * Get the sambutan for this struktur organisasi
     */
    public function sambutan()
    {
        return $this->hasOne(SambutanKepalaDesa::class, 'struktur_organisasi_id');
    }

    /**
     * Scope untuk struktur yang aktif
     */
    public function scopeAktif($query)
    {
        return $query->where('aktif', true);
    }

    /**
     * Scope untuk struktur yang tidak aktif
     */
    public function scopeNonaktif($query)
    {
        return $query->where('aktif', false);
    }

    /**
     * Scope untuk mengurutkan berdasarkan urutan
     */
    public function scopeUrutan($query)
    {
        return $query->orderBy('urutan', 'asc');
    }

    /**
     * Get the foto URL
     */
    public function getFotoUrlAttribute()
    {
        return asset($this->foto);
    }

    /**
     * Check if this person is kepala desa
     */
    public function getIsKepalaDesaAttribute()
    {
        return str_contains(strtolower($this->jabatan), 'kepala desa');
    }
}
