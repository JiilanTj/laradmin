<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'title',
        'description',
        'stock',
        'modal',
        'feedropship',
        'feedokter',
        'feeadmin',
        'laba',
        'feelayanan',
        'hargacoret',
        'hargaasli',
        'gambarutama',
        'gambar1',
        'gambar2',
        'gambar3',
        'iskhusus',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->hargaasli = $model->modal + $model->feedropship + $model->feedokter + $model->feeadmin + $model->laba + $model->feelayanan;
        });
    }
}
