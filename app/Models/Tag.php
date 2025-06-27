<?php

namespace App\Models;

use App\Models\ProductTag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function product_tags() {
        return $this->hasMany(ProductTag::class);
    }
}
