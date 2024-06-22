<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;

    protected $fillable = [
        'gedung_id',
        'peminjam_id'
    ];

    public function peminjam(){
        return $this->belongsTo(Peminjam::class);
    }

    public function gedung(){
        return $this->belongsTo(Gedung::class);
    }
}
