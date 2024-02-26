<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $table = 'type';
    protected $fillable = ['nama_type', 'kategori_id'];

    public function menu() {
        return $this->hasMany(Menu::class, 'type_id', 'id');
    }

    public function kategori() {
        return $this->belongsTo(Kategori::class, 'id');
    }
}
