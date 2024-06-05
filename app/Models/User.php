<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'no_telepon',
        'email',
        'alamat',
        'no_ktp',
        'jenis_kelamin',
        'golongan_darah',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'provinsi',
        'kota',
        'pendidikan_terakhir',
        'tipe_pendaftaran',
        'status_peserta',
        'role',
        'tanggal_pendaftaran',
        'pelatihan_id',
        'password',
        'ktp',
        'cv',
        'foto_background_merah',
        'surat_keterangan_bekerja',
        'scan_ijazah_terakhir',
        'foto_tanda_tangan',
    ];

    public function pelatihans()
    {
        return $this->belongsToMany(Pelatihan::class, 'user_pelatihan');
    }

    // public function pelatihan()
    // {
    //     return $this->belongsTo(Pelatihan::class);
    // }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
