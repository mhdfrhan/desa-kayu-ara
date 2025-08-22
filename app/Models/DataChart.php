<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataChart extends Model
{
    use HasFactory;

    protected $table = 'data_chart';

    protected $fillable = [
        'chart_id',
        'label',
        'nilai',
        'warna',
        'deskripsi',
        'urutan',
        'aktif'
    ];

    protected $casts = [
        'nilai' => 'decimal:2',
        'urutan' => 'integer',
        'aktif' => 'boolean'
    ];

    public function chart()
    {
        return $this->belongsTo(ChartStatistik::class, 'chart_id');
    }

    public function scopeAktif($query)
    {
        return $query->where('aktif', true);
    }

    public function scopeUrutkan($query)
    {
        return $query->orderBy('urutan', 'asc');
    }
}
