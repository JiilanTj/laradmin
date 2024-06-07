<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
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
                {{ __('Super Admin Product') }}
            </h2>
        </x-slot>

        <div class="flex">
            @include('components.sidebar')
            <div class="content">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <div class="flex items-center justify-between mb-6">
                                <h1 class="text-2xl font-bold">Add Product</h1>
                                <a href="{{ route('admin/superadmin/products') }}" class="btn btn-primary">Go Back</a>
                            </div>
                            <hr class="my-4" />
                            @if (session()->has('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <form action="{{ route('admin/superadmin/products/save') }}" method="POST" enctype="multipart/form-data" id="product-form">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control" placeholder="Title">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control" placeholder="Description"></textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="stock">Stock</label>
                                    <input type="number" name="stock" id="stock" class="form-control" placeholder="Stock">
                                    @error('stock')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="modal">Modal</label>
                                    <input type="text" name="modal" id="modal" class="form-control currency" placeholder="Modal">
                                    @error('modal')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="feedropship">Feedropship</label>
                                    <input type="text" name="feedropship" id="feedropship" class="form-control currency" placeholder="Feedropship">
                                    @error('feedropship')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="feedokter">Feedokter</label>
                                    <input type="text" name="feedokter" id="feedokter" class="form-control currency" placeholder="Feedokter">
                                    @error('feedokter')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="feeadmin">Feeadmin</label>
                                    <input type="text" name="feeadmin" id="feeadmin" class="form-control currency" placeholder="Feeadmin">
                                    @error('feeadmin')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="feelayanan">Feelayanan</label>
                                    <input type="text" name="feelayanan" id="feelayanan" class="form-control currency" placeholder="Feelayanan">
                                    @error('feelayanan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="laba">Laba</label>
                                    <input type="text" name="laba" id="laba" class="form-control currency" placeholder="Laba">
                                    @error('laba')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="hargacoret">Hargacoret</label>
                                    <input type="text" name="hargacoret" id="hargacoret" class="form-control currency" placeholder="Hargacoret">
                                    @error('hargacoret')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="gambarutama">Gambarutama</label>
                                    <input type="file" name="gambarutama" id="gambarutama" class="form-control">
                                    @error('gambarutama')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="gambar1">Gambar1</label>
                                    <input type="file" name="gambar1" id="gambar1" class="form-control">
                                    @error('gambar1')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="gambar2">Gambar2</label>
                                    <input type="file" name="gambar2" id="gambar2" class="form-control">
                                    @error('gambar2')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="gambar3">Gambar3</label>
                                    <input type="file" name="gambar3" id="gambar3" class="form-control">
                                    @error('gambar3')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="iskhusus">Iskhusus</label>
                                    <select name="iskhusus" id="iskhusus" class="form-control">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    @error('iskhusus')
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
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const currencyFields = document.querySelectorAll('.currency');

            currencyFields.forEach(field => {
                field.addEventListener('input', function (e) {
                    let value = e.target.value.replace(/[^\d]/g, '');
                    if (value) {
                        e.target.value = formatCurrency(value);
                    }
                });
            });

            document.getElementById('product-form').addEventListener('submit', function (e) {
                currencyFields.forEach(field => {
                    field.value = field.value.replace(/[^\d]/g, '');
                });
            });
        });

        function formatCurrency(value) {
            return 'Rp ' + new Intl.NumberFormat('id-ID').format(value);
        }
    </script>
</body>
</html>
