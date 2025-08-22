<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ChartStatistik extends Model
{
    use HasFactory;

    protected $table = 'chart_statistik';

    protected $fillable = [
        'nama',
        'slug',
        'deskripsi',
        'tipe_chart',
        'konfigurasi',
        'warna_primary',
        'warna_secondary',
        'urutan',
        'aktif'
    ];

    protected $casts = [
        'konfigurasi' => 'array',
        'urutan' => 'integer',
        'aktif' => 'boolean'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($chart) {
            if (empty($chart->slug)) {
                $chart->slug = Str::slug($chart->nama);
            }
        });
    }

    public function dataChart()
    {
        return $this->hasMany(DataChart::class, 'chart_id');
    }

    public function scopeAktif($query)
    {
        return $query->where('aktif', true);
    }

    public function scopeUrutkan($query)
    {
        return $query->orderBy('urutan', 'asc');
    }

    public function scopeTipeChart($query, $tipe)
    {
        return $query->where('tipe_chart', $tipe);
    }

    public function getDataChartAktifAttribute()
    {
        return $this->dataChart()->aktif()->urutkan()->get();
    }
}
