<?php

namespace App\Models;

use App\Models\ProductOrder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductRiview extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function product_orders() {
        return $this->belongsTo(ProductOrder::class);
    }
}
