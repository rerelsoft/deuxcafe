<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Titipan extends Model
{
    use HasFactory;

    protected $table = 'titipan';
    protected $fillable = ['nama_produk', 'nama_supplier', 'harga_beli', 'harga_jual', 'stok', 'keterangan'];
}
