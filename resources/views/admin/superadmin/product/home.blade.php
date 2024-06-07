<!-- resources/views/admin/superadmin/product/home.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Super Admin Product') }}
        </h2>
    </x-slot>

    <div class="flex">
        @include('components.sidebar')
        <div class="content" style="margin-left: 250px; padding: 20px; box-sizing: border-box; flex-grow: 1; background-color: #f7fafc;">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <div class="flex items-center justify-between mb-6">
                                <h1 class="text-2xl font-bold">List Product</h1>
                                <a href="{{ route('admin/superadmin/products/create') }}" class="btn btn-primary" style="margin-bottom: 10px;">Add Product</a>
                            </div>
                            <hr class="my-4" />
                            @if(Session::has('success'))
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                                <span class="block sm:inline">{{ Session::get('success') }}</span>
                            </div>
                            @endif
                            <div class="overflow-x-auto">
                                <table class="min-w-full bg-white divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Fee</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Modal</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Hargaasli</th>
                                            {{-- <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Accesor</th> --}}
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gambarutama</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Iskhusus</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @forelse ($products as $product)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $loop->iteration }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product->title }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product->stock }}</td>
                                            <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product->formatted_total_fee }}</td>
                                            <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product->formatted_modal }}</td>
                                            <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product->formatted_hargaasli }}</td>
                                            {{-- <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product->gambarutama ?? 'Gambar Utama Tidak Tersedia' }}</td> --}}
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <img src="{{ $product->gambarutama }}" alt="Gambar Utama" style="width: 100px; height: auto;">
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product->iskhusus ? 'Yes' : 'No' }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <div class="flex space-x-2">
                                                    <a href="{{ route('admin/superadmin/products/edit', ['id' => $product->id]) }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded" style="margin-right: 10px;">Edit</a>
                                                    <a href="{{ route('admin/superadmin/products/delete', ['id' => $product->id]) }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-900" colspan="18">Product not found</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
