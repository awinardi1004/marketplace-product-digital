<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\ProductTag;
use App\Models\ProductTechnology;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function creator(){
        return $this->belongsTo(User::class);
    }

    public function product_technologies() {
        return $this->hasMany(ProductTechnology::class);
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class, 'product_technologies');
    }

    public function product_tags()
    {
        return $this->belongsTo(ProductTag::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tags');
    }
}
