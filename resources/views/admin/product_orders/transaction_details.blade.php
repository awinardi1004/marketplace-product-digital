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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
