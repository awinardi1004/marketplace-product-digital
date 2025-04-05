<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transaction') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
                <div class="flex flex-row justify-between items-center mb-5">
                    <h3 class="text-indigo-950 font-bold text-xl">My Transactions</h3>
                </div>
                @forelse ($my_transactions as $transaction)
                <div class="item-product flex flex-row justify-between items-center p-4 border rounded-md shadow-md">
                    <div class="flex flex-row items-center gap-x-5">
                        <img src="{{ Storage::url($transaction->product->cover) }}" class="rounded-2xl h-[100px] w-auto" alt="">
                
                        <div>
                            <h3 class="text-indigo-950 font-bold text-xl">{{ $transaction->product->name}}</h3>
                            <p class="text-slate-500 text-sm">{{$transaction->product->category->name}}</p>
                        </div>
                    </div>
                    <div>
                        <p class="text-slate-500 text-sm">Total Price :</p>
                        <p class="text-indigo-950 font-bold text-xl mb-2">Rp. {{ $transaction->total_price}}</p>
                    </div>
                    <div>
                        <p class="text-slate-500 text-sm">Status :</p>
                        @if ($transaction->is_paid)
                            <span class="Py-1 px-3 flex rounded-full bg-green-500 text-white font-bold text-sm">
                                Success
                            </span>
                        @else 
                            <span class="Py-1 px-3 flex rounded-full  bg-orange-500 text-white font-bold text-sm">
                                PENDING
                            </span>
                        @endif
                    </div>
                    <div class="flex flex-row gap-x-3">
                        <a href="{{ route('admin.product_orders.transactions.details', $transaction)}}" class="px-5 py-2 flex items-center justify-center bg-indigo-500 text-white rounded-full hover:bg-indigo-600 transition">
                            View Detail
                        </a>
                    </div>
                </div>
                
                @empty
                    <p>Belum ada transaksi anda tersedia</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
