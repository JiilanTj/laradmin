<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Store') }}
        </h2>
    </x-slot>
  
    <div class="flex">
        @include('components.sidebar') <!-- Include the sidebar here -->
        <div class="content" style="margin-left: 250px; padding: 20px; box-sizing: border-box; flex-grow: 1; background-color: #f7fafc;">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <div class="flex items-center justify-between mb-6">
                                <h1 class="text-2xl font-bold">Edit Store</h1>
                            </div>
                            <hr class="my-4" />
                            <form action="{{ route('admin.superadmin.masterdata.store.update', $stores->id) }}" method="POST" enctype="multipart/form-data" id="edit-store-form">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-4">
                                    <label for="tipe" class="block text-gray-700 font-bold mb-2">Tipe Store</label>
                                    <select name="tipe" id="tipe" class="form-control border border-gray-300 p-2 rounded w-full">
                                        <option value="pusat" {{ $stores->tipe === 'pusat' ? 'selected' : '' }}>Pusat</option>
                                        <option value="reseller" {{ $stores->tipe === 'reseller' ? 'selected' : '' }}>Reseller</option>
                                    </select>
                                    @error('tipe')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="nama" class="block text-gray-700 font-bold mb-2">Nama Store</label>
                                    <input type="text" name="nama" id="nama" class="form-control border border-gray-300 p-2 rounded w-full" placeholder="Nama" value="{{ $stores->nama }}">
                                    @error('nama')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="phone" class="block text-gray-700 font-bold mb-2">No. Telepon</label>
                                    <input type="text" name="phone" id="phone" class="form-control border border-gray-300 p-2 rounded w-full" placeholder="Nomor Telepon" value="{{ $stores->phone }}">
                                    @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="alamat" class="block text-gray-700 font-bold mb-2">Alamat</label>
                                    <input type="text" name="alamat" id="alamat" class="form-control border border-gray-300 p-2 rounded w-full" placeholder="Alamat" value="{{ $stores->alamat }}">
                                    @error('alamat')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="provinsi" class="block text-gray-700 font-bold mb-2">Provinsi</label>
                                    <input type="text" name="provinsi" id="provinsi" class="form-control border border-gray-300 p-2 rounded w-full" placeholder="Provinsi" value="{{ $stores->provinsi }}">
                                    @error('provinsi')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="kota" class="block text-gray-700 font-bold mb-2">Kota</label>
                                    <input type="text" name="kota" id="kota" class="form-control border border-gray-300 p-2 rounded w-full" placeholder="Kota" value="{{ $stores->kota }}">
                                    @error('kota')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="kecamatan" class="block text-gray-700 font-bold mb-2">Kecamatan</label>
                                    <input type="text" name="kecamatan" id="kecamatan" class="form-control border border-gray-300 p-2 rounded w-full" placeholder="Kecamatan" value="{{ $stores->kecamatan }}">
                                    @error('kecamatan')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="kode_pos" class="block text-gray-700 font-bold mb-2">Kode Pos</label>
                                    <input type="text" name="kode_pos" id="kode_pos" class="form-control border border-gray-300 p-2 rounded w-full" placeholder="Kode Pos" value="{{ $stores->kode_pos }}">
                                    @error('kode_pos')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="latitude" class="block text-gray-700 font-bold mb-2">Latitude</label>
                                    <input type="text" name="latitude" id="latitude" class="form-control border border-gray-300 p-2 rounded w-full" placeholder="Latitude" value="{{ $stores->latitude }}">
                                    @error('latitude')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="longitude" class="block text-gray-700 font-bold mb-2">Longitude</label>
                                    <input type="text" name="longitude" id="longitude" class="form-control border border-gray-300 p-2 rounded w-full" placeholder="Longitude" value="{{ $stores->longitude }}">
                                    @error('longitude')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </form>                            
                            <p class="mt-4"><a href="{{ route('admin.superadmin.masterdata.store') }}" class="btn btn-secondary">Go Back</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </x-app-layout>
  