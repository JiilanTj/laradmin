<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;

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

    // Accessors for formatted currency values
    public function getFormattedFeedropshipAttribute()
    {
        return $this->formatCurrency($this->feedropship);
    }

    public function getFormattedFeedokterAttribute()
    {
        return $this->formatCurrency($this->feedokter);
    }

    public function getFormattedFeeadminAttribute()
    {
        return $this->formatCurrency($this->feeadmin);
    }

    public function getFormattedFeelayananAttribute()
    {
        return $this->formatCurrency($this->feelayanan);
    }

    public function getFormattedTotalFeeAttribute()
    {
        $totalfee = $this->feedropship + $this->feedokter + $this->feeadmin + $this->feelayanan;
        return $this->formatCurrency($totalfee);
    }

    public function getFormattedModalAttribute()
    {
        return $this->formatCurrency($this->modal);
    }

    public function getFormattedHargaasliAttribute()
    {
        return $this->formatCurrency($this->hargaasli);
    }

    public function getFormattedHargacoretAttribute()
    {
        return $this->formatCurrency($this->hargacoret);
    }

    private function formatCurrency($value)
    {
        return 'Rp ' . number_format($value, 0, ',', '.');
    }

    // Accessors for image URLs
    protected function gambarutama(): Attribute
    {
        return Attribute::make(
            get: fn ($gambarutama) => url($gambarutama),
        );
    }

    protected function gambar1(): Attribute
    {
        return Attribute::make(
            get: fn ($gambar1) => url($gambar1),
        );
    }

    protected function gambar2(): Attribute
    {
        return Attribute::make(
            get: fn ($gambar2) => url($gambar2),
        );
    }

    protected function gambar3(): Attribute
    {
        return Attribute::make(
            get: fn ($gambar3) => url($gambar3),
        );
    }

}
