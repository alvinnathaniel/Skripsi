<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spesifikasi extends Model
{
    use HasFactory;

    protected $table = 'spesifikasi';
    protected $primaryKey = 'id';
    protected $fillable = ['attribute', 'value', 'produk_id'];

    public function Produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
