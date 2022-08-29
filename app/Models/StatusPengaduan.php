<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPengaduan extends Model
{
    use HasFactory;

    protected $table = ['status_pengaduan'];

    protected $fillable = ['pengaduan_id'];

    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class, 'id', 'id');
    }
}
