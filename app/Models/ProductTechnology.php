<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Technology;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductTechnology extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    public function technology() {
        return $this->belongsTo(Technology::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
