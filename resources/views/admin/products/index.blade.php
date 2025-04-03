<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg flex flex-col gap-y-5">
                <a href="{{route('admin.products.create')}}" class="w-fit py-3 px-5 bg-indigo-950 text-white">
                    Add New Product
                </a>
                @forelse ($products as $product)
                <div class="item-product flex flex-row justify-between items-center p-4 border rounded-md shadow-md">
                    <img src="{{ Storage::url($product->cover) }}" class="h-[100px] w-auto" alt="">
                
                    <div>
                        <h3 class="text-lg font-semibold">{{ $product->name}}</h3>
                        <p class="text-gray-600">{{$product->category->name}}</p>
                        <p class="text-gray-600">{{$product->creator->name}}</p>
                    </div>
                
                    <div>
                        <p class="text-gray-800 font-bold">Rp. {{ $product->price}}</p>
                    </div>
                
                    <div class="flex flex-row gap-x-3">
                        <a href="#" class="w-20 h-10 flex items-center justify-center bg-indigo-500 text-white rounded-md hover:bg-indigo-600 transition">
                            Edit
                        </a>
                        <a href="#" class="w-20 h-10 flex items-center justify-center bg-red-500 text-white rounded-md hover:bg-red-600 transition">
                            Delete
                        </a>
                    </div>
                </div>
                
                @empty
                    <p>Belum ada produk tersedia</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
