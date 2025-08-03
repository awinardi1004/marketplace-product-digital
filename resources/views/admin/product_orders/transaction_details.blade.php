<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg flex flex-col gap-y-5">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="py-5 px-4 bg-red-500 text-white font-bold">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="item-product flex flex-col gap-y-10 p-4 border rounded-md shadow-md">
                    <img src="{{ Storage::url($order->product->cover) }}" class="h-auto w-[300px]" alt="">
                    <div>
                        <h3 class="text-xl text-indigo-950 font-bold">{{ $order->product->name}}</h3>
                        <p class="text-sm text-slate-500 font-bold">{{$order->product->category->name}}</p>
                        <p class="text-sm text-slate-500 font-bold">{{$order->product->creator->name}}</p>
                        
                    </div>
                    <div class="flex flex-row gap-x-5 items-center">
                        <p class="text-gray-800 font-bold mb-2">Rp. {{ $order->total_price}}</p>
                        @if ($order->is_paid)
                            <span class="py-2 px-5 rounded-full bg-green-500 text-white font-bold text-sm">Paid</span>
                        @else
                            <span class="py-2 px-5 rounded-full bg-orange-500 text-white font-bold text-sm">PENDING</span>
                        @endif
                    </div>
                    <img src="{{ Storage::url($order->proof) }}" class="h-auto w-[300px]" alt="">
                    <div class="flex flex-row gap-x-3">
                        @if ($order->is_paid)
                            <a href="{{route('admin.product_orders.download', $order)}}" class="px-4 py-2 flex items-center justify-center bg-indigo-500 text-white rounded-md hover:bg-red-600 transition">
                                Download Product
                            </a>
                        @endif
                    </div>
                    <div class="mt-6">
                        @if ($order->product_review)
                            <p class="text-green-700 font-semibold mb-2">Produk telah direview. Terima kasih atas ulasan Anda.</p>
                        @endif

                        @if (!$order->product_review)
                            <form method="POST" action="{{ route('admin.review.store', $order->id) }}">
                                @csrf

                                <label for="rating" class="block text-sm font-medium text-gray-700 mb-2">Rating</label>
                                <div id="rating-stars" class="flex gap-x-1 text-3xl text-gray-400">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <button type="button" class="star" data-value="{{ $i }}">★</button>
                                    @endfor
                                </div>
                                <input type="hidden" name="rating" id="rating-value" required>

                                <label for="review" class="block text-sm font-medium text-gray-700 mt-5">Your Review</label>
                                <textarea id="review" name="review" rows="4" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Write your thoughts..."></textarea>

                                <button type="submit" class="mt-5 px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
                                    Submit Review
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const stars = document.querySelectorAll('.star');
        const ratingInput = document.getElementById('rating-value');

        stars.forEach((star, index) => {
            star.addEventListener('click', function () {
                const rating = this.getAttribute('data-value');
                ratingInput.value = rating;

                stars.forEach(s => s.classList.remove('text-yellow-500'));
                for (let i = 0; i < rating; i++) {
                    stars[i].classList.add('text-yellow-500');
                }
            });
        });
    });
</script>
