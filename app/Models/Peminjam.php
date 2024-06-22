<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjam extends Model
{
    use HasFactory;

    protected $fillable = [
        'gedung_id',
        'nama_peminjam',
        'alamat',
        'email',
        'no_hp',
        'no_ktp',
        'foto_ktp',
        'agenda',
        'tgl_awal',
        'tgl_akhir',
        'waktu',
        'jam_operasional',
        'status_kepala',
        'status_sekertaris'
    ];

    protected $guarded = [
        'id'
    ];

    public function peralatan(){
        return $this->hasMany(Peralatan::class, 'peminjam_id', 'id');
    }

    public function perlengkapan(){
        return $this->hasMany(Perlengkapan::class, 'peminjam_id', 'id');
    }

    public function rent()
    {
        $this->hasOne(Rent::class, 'peminjam_id', 'id');
    }
}
