<?php

namespace App\Models\Custom;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desain extends Model
{
    use HasFactory;

    protected $table = 'custom_desain';
    protected $fillable = [
        'tipe_id',
        'part',
        'nama',
        'harga',
        'gambar'
    ];
}
