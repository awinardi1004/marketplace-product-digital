<?php

namespace App\Models;

use App\Models\ProductOrder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductReview extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function productOrder()
    {
        return $this->belongsTo(ProductOrder::class);
    }
}
