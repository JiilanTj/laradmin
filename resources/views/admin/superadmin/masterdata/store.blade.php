<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Store') }}
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
                                <h1 class="text-2xl font-bold">Daftar Store</h1>
                                <a href="{{ route('admin.superadmin.masterdata.store.create') }}" class="btn btn-primary" style="margin-bottom: 10px;">Add Store</a>
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
                                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Tipe</th>
                                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Alamat</th>
                                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @forelse ($stores as $store)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-900">{{ $store->id }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-900">{{ $store->tipe }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-900">{{ $store->nama }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-900">{{ $store->phone }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-900">{{ $store->alamat }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                                    <div class="flex justify-center">
                                                        <a href="{{ route('admin.superadmin.masterdata.store.edit', ['id' => $store->id]) }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mx-2">Edit</a>
                                                        <a href="{{ route('admin.superadmin.masterdata.store.delete', ['id' => $store->id]) }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mx-2">Delete</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-900" colspan="6">Stores not found</td>
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
