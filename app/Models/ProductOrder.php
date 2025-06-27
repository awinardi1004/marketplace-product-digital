<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use App\Models\ProductRiview;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class ProductOrder extends Model
{
    use HasFactory, SoftDeletes;


    protected $guarded = ['id'];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function buyer() {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function product_review() {
        return $this->hasOne(ProductRiview::class);
    }
}
