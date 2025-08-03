<?php

namespace App\Http\Controllers;
use App\Models\ProductOrder;
use App\Models\ProductReview;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class ProductReviewController extends Controller
{
    public function create(ProductOrder $productOrder)
    {
        $user_id = Auth::id();

        if ($productOrder->buyer_id !== $user_id) {
            abort(403, 'Unauthorized action.');
        }

        if (ProductReview::where('product_order_id', $productOrder->id)->exists()) {
            return back()->with('error', 'You have already reviewed this product.');
        }

        return view('transactions.review', compact('productOrder'));
    }

    public function store(Request $request, ProductOrder $productOrder)
    {
        $user_id = Auth::id();

        if ($productOrder->buyer_id !== $user_id) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'nullable|string|max:1000',
        ]);

        ProductReview::create([
            'product_order_id' => $productOrder->id,
            'rating' => $validated['rating'],
            'review' => $validated['review'],
        ]);

        return redirect()->route('product_orders.transactions.details', $productOrder->id)
            ->with('success', 'Thank you for your review.');
    }

}
