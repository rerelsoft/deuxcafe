<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu';
    protected $fillable = ['nama_menu', 'harga', 'deskripsi', 'type_id'];

    public function type() {
        return $this->belongsTo(Type::class, 'type_id');
    }
}

