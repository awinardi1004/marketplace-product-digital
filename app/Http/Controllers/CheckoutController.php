<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class CheckoutController extends Controller
{
    public function checkout(Product $product)
    {
        return view('front.checkout', [
            'product' => $product
        ]);
    }
}
