<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    use HasFactory;
    protected $table = 'pelatihans';
    protected $fillable = [
        'nama_pelatihan',
        'harga',
        'cover'
    ];

    // Definisikan relasi many-to-many dengan model User
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_pelatihan');
    }

    // public function users()
    // {
    //     return $this->hasMany(User::class);
    // }
}
