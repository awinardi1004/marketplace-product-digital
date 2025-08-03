<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Technology;
use Illuminate\Http\Request;
use App\Models\ProductReview;


class FrontController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        $new_products = Product::orderBy('created_at', 'desc')->take(10)->get();
        $tools = Technology::all();
        $product_reviews = ProductReview::all();

        return view('front.index', [
            'products' => $products,
            'categories' => $categories,
            'new_products' => $new_products,
            'tools' => $tools,
            'product_reviews' => $product_reviews,
        ]);
    }

    public function details(Product $product)
    {
        $other_products = Product::where('id', '!=', $product->id)->get();
        $creator_id = $product->creator_id;
        $creator_products = Product::where('creator_id',  $creator_id)->get();
        $product_reviews = ProductReview::whereHas('productOrder', function ($query) use ($product) 
        {
            $query->where('product_id', $product->id);
        })->with('productOrder.product', 'productOrder.buyer')->get();

        return view('front.details', [
            'product' => $product,
            'other_products' => $other_products,
            'creator_products' => $creator_products,
            'product_reviews' => $product_reviews
        ]);
    }

    public function category(Category $category)
    {
        $product_categories = Product::where('category_id',  $category->id)->orderBy('created_at', 'desc')->get();
        $tools = Technology::all();

        return view('front.category', [
            'category' => $category,
            'product_categories' => $product_categories,
            'tools' => $tools,
        ]);
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $products = Product::query()
        ->where('name', 'LIKE', '%'. $keyword . '%')
        ->orWhereHas('category', function ($query) use ($keyword){
            $query->where('name', 'LIKE', '%'. $keyword . '%');
        })->get();

        return view('front.search', [
            'products' =>  $products
        ]);
    }
}
