<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPelatihan extends Model
{
    use HasFactory;
    protected $table = 'user_pelatihan';
    protected $fillable = [
        'user_id',
        'pelatihan_id',
        'status_peserta',
        'status_bayar',
        'status_sertifikat',
        'sertifikat',
    ];

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke model Pelatihan
    public function pelatihan()
    {
        return $this->belongsTo(Pelatihan::class);
    }
    
}
