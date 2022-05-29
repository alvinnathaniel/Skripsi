<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    protected $primaryKey = 'id';
    protected $fillable = ['produk', 'kategori_id', 'keterangan', 'gambar'];

    public function Kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function Spesifikasi()
    {
        return $this->hasMany(Spesifikasi::class);
    }
}
