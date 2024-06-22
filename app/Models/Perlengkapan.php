<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perlengkapan extends Model
{
    use HasFactory;

    protected $fillable = [
        'peminjam_id',
        'nama',
        'harga',
        'jumlah'
    ];

    public function peminjam(){
        return $this->belongsTo(Peminjam::class);
    }
}
