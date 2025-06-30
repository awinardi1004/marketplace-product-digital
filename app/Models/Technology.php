<?php

namespace App\Models;

use App\Models\ProductTechnology;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Technology extends Model
{
    use HasFactory;

    public function product_technologies () {
        return $this->hasMany(ProductTechnology::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($tech) {
            $tech->slug = Str::slug($tech->name);
        });
    }
}
