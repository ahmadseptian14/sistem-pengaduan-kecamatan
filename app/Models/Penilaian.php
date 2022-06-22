<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',  'users_id'
    ];

    protected $hidden = [
    
    ];

    public function user() {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }


}
