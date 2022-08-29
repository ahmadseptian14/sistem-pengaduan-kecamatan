<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengaduan extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'nama', 'user_nik', 'user_id', 'judul_pengaduan', 'kategori_pengaduan', 'keterangan', 'status', 'tanggal_perizinan'
    ];

    protected $hidden = [
    
    ];
    
    public function user() {
        return $this->belongsTo(User::class, 'user_nik', 'nik');
    }

    public function details() {
        return $this->hasMany(Pengaduan::class, 'id', 'id');
    }

    public function phones() {
        return $this->belongsTo(User::class);
    }

    public function tanggapans() {
        return $this->hasMany(Tanggapan::class, 'pengaduan_id', 'id');
    }

    public function tanggapan() {
        return $this->hasOne(Tanggapan::class)->latestOfMany('status_pengaduan');
    }

    public function status() {
        return $this->belongsTo(Tanggapan::class, 'status_id','status');
    }


    
}
