<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Stores</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7fafc;
        }
        .container {
            max-width: 100%;
            margin: 0 auto;
            padding: 20px;
            box-sizing: border-box;
        }
        .header {
            background-color: #333;
            color: #fff;
            padding: 15px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            box-sizing: border-box;
            background-color: #fff;
            flex-grow: 1;
        }
        .btn {
            display: inline-block;
            padding: 8px 16px;
            font-size: 14px;
            cursor: pointer;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
        .btn-primary {
            background-color: #007bff;
            color: #fff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        form {
            margin-top: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        .form-control {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .text-danger {
            color: #dc3545;
        }
    </style>
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Super Admin Stores') }}
            </h2>
        </x-slot>

        <div class="flex">
            @include('components.sidebar')
            <div class="content">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <div class="flex items-center justify-between mb-6">
                                <h1 class="text-2xl font-bold">Add Store</h1>
                                <a href="{{ route('admin.superadmin.masterdata.store') }}" class="btn btn-primary">Go Back</a>
                            </div>
                            <hr class="my-4" />
                            @if (session()->has('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <form action="{{ route('admin.superadmin.masterdata.store.save') }}" method="POST" enctype="multipart/form-data" id="store-form">
                                @csrf
                                <div class="form-group">
                                    <label for="tipe">Tipe Store</label>
                                    <select name="tipe" id="tipe" class="form-control">
                                        <option value="pusat">Pusat</option>
                                        <option value="reseller">Reseller</option>
                                    </select>
                                    @error('tipe')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>                                
                                <div class="form-group">
                                    <label for="nama">Nama Store</label>
                                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Store">
                                    @error('nama')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="phone">No. Telepon</label>
                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Nomor Telepon">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat Store">
                                    @error('alamat')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- Tambahkan input untuk kolom-kolom baru -->
                                <div class="form-group">
                                    <label for="provinsi">Provinsi</label>
                                    <input type="text" name="provinsi" id="provinsi" class="form-control" placeholder="Provinsi">
                                    @error('provinsi')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="kota">Kota</label>
                                    <input type="text" name="kota" id="kota" class="form-control" placeholder="Kota">
                                    @error('kota')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="kecamatan">Kecamatan</label>
                                    <input type="text" name="kecamatan" id="kecamatan" class="form-control" placeholder="Kecamatan">
                                    @error('kecamatan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="kode_pos">Kode Pos</label>
                                    <input type="text" name="kode_pos" id="kode_pos" class="form-control" placeholder="Kode Pos">
                                    @error('kode_pos')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="latitude">Latitude</label>
                                    <input type="text" name="latitude" id="latitude" class="form-control" placeholder="Latitude">
                                    @error('latitude')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="longitude">Longitude</label>
                                    <input type="text" name="longitude" id="longitude" class="form-control" placeholder="Longitude">
                                    @error('longitude')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
