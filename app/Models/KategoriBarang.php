<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriBarang extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name'];

    public function kategori()
    {
        return $this->hasMany(Produk::class);
    }
}