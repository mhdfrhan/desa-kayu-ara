<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleriLike extends Model
{
    use HasFactory;

    protected $fillable = [
        'galeri_id',
        'ip_address',
        'user_agent'
    ];

    public function galeri()
    {
        return $this->belongsTo(Galeri::class);
    }
}
