<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductTag extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function tag() {
        return $this->belongsTo(Tag::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
