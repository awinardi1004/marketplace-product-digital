<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductOrder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class CheckoutController extends Controller
{
    public function checkout(Product $product)
    {
        return view('front.checkout', [
            'product' => $product
        ]);
    }

    public function store(Request $request, Product $product)
    {
        if($product->creator_id === Auth::id()) 
        {
            $error = ValidationException::withMessages([
                'system_error' => ['Do not buy your own product'],
            ]);
            throw $error;
        }

        $validated = $request->validate([
            'proof' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        if($request->hasFile('proof')){
            $proofPath = $request->file('proof')->store('payment_proofs', 'public');
            $validated['proof'] = $proofPath;
        }

        $data = [
            'total_price' => $product->price,
            'is_paid' => false,
            'buyer_id' => Auth::id(),
            'creator_id' => $product->creator_id,
            'product_id' => $product->id,
            'proof' => $validated['proof'] = $proofPath,
        ];

        DB::beginTransaction();

        try {
            
            $newOrder = ProductOrder::firstOrCreate($data);

            DB::commit();

            return redirect()->route('admin.product_orders.transactions')->with('succes', 'success checkout succesfuly');
        } 
        catch (\Exception $e) {
            DB::rollBack();

            $error = ValidationException::withMessages([
                'system_error' => ['System error!'.$e->getMessage()]
            ]);

            throw $error;
        }
    }
}
