<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(auth()->user()->is_admin)
                    <button>Create New Product</button>
                    @endif
                    <table class="hover:table-fixed">
                        <thead>
                            <tr>
                                <th>ID</th> 
                                <th>Name</th>
                                <th>Price in INR</th>
                                <th>Price in USD</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse($products as $product)
                            <tr>
                                <td>{{ $product->id}}</td>
                                <td>{{ $product->name}}</td>
                                <td>{{ number_format($product->price,2)}}</td>
                                <td>{{ $product->price_usd}}</td>
                            </tr>
                            @empty
                            <tr>
                                No Product Found..
                            </tr>
                            @endforelse
                            {{ $products->links() }}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>