<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tipe',
        'nama',
        'phone',
        'alamat',
        'provinsi',
        'kota',
        'kecamatan',
        'kode_pos',
        'latitude',
        'longitude',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        // Jika ada atribut yang ingin Anda sembunyikan, tambahkan di sini
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        // Jika ada atribut yang ingin Anda cast, tambahkan di sini
    ];
}
