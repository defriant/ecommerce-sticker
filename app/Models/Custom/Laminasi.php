<?php

namespace App\Models\Custom;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laminasi extends Model
{
    use HasFactory;

    protected $table = 'custom_laminasi';
    protected $fillable = [
        'nama',
        'harga'
    ];
}
