<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Edit Product') }}
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
                              <h1 class="text-2xl font-bold">Edit Product</h1>
                          </div>
                          <hr class="my-4" />
                          <form action="{{ route('admin/superadmin/products/update', $products->id) }}" method="POST" enctype="multipart/form-data" id="edit-product-form">
                              @csrf
                              @method('PUT')
                              <div class="form-group mb-4">
                                  <label for="title" class="block text-gray-700 font-bold mb-2">Product Name</label>
                                  <input type="text" name="title" id="title" class="form-control border border-gray-300 p-2 rounded w-full" placeholder="Title" value="{{$products->title}}">
                                  @error('title')
                                  <span class="text-danger">{{$message}}</span>
                                  @enderror
                              </div>
                              <div class="form-group mb-4">
                                  <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
                                  <textarea name="description" id="description" class="form-control border border-gray-300 p-2 rounded w-full" placeholder="Description">{{$products->description}}</textarea>
                                  @error('description')
                                  <span class="text-danger">{{$message}}</span>
                                  @enderror
                              </div>
                              <div class="form-group mb-4">
                                  <label for="stock" class="block text-gray-700 font-bold mb-2">Stock</label>
                                  <input type="number" name="stock" id="stock" class="form-control border border-gray-300 p-2 rounded w-full" placeholder="Stock" value="{{$products->stock}}">
                                  @error('stock')
                                  <span class="text-danger">{{$message}}</span>
                                  @enderror
                              </div>
                              <div class="form-group mb-4">
                                  <label for="modal" class="block text-gray-700 font-bold mb-2">Modal</label>
                                  <input type="text" name="modal" id="modal" class="form-control border border-gray-300 p-2 rounded w-full currency" placeholder="Modal" value="{{$products->modal}}">
                                  @error('modal')
                                  <span class="text-danger">{{$message}}</span>
                                  @enderror
                              </div>
                              <div class="form-group mb-4">
                                  <label for="feedropship" class="block text-gray-700 font-bold mb-2">Feedropship</label>
                                  <input type="text" name="feedropship" id="feedropship" class="form-control border border-gray-300 p-2 rounded w-full currency" placeholder="Feedropship" value="{{$products->feedropship}}">
                                  @error('feedropship')
                                  <span class="text-danger">{{$message}}</span>
                                  @enderror
                              </div>
                              <div class="form-group mb-4">
                                <label for="feedokter" class="block text-gray-700 font-bold mb-2">Feedokter</label>
                                <input type="text" name="feedokter" id="feedokter" class="form-control border border-gray-300 p-2 rounded w-full currency" placeholder="Feedokter" value="{{$products->feedokter}}">
                                @error('feedokter')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                              <div class="form-group mb-4">
                                  <label for="feeadmin" class="block text-gray-700 font-bold mb-2">Feeadmin</label>
                                  <input type="text" name="feeadmin" id="feeadmin" class="form-control border border-gray-300 p-2 rounded w-full currency" placeholder="Feeadmin" value="{{$products->feeadmin}}">
                                  @error('feeadmin')
                                  <span class="text-danger">{{$message}}</span>
                                  @enderror
                              </div>
                              <div class="form-group mb-4">
                                <label for ="feelayanan" class="block text-gray-700 font-bold mb-2">Feelayanan</label>
                                <input type="text" name="feelayanan" id="feelayanan" class="form-control border border-gray-300 p-2 rounded w-full currency" placeholder="Feelayanan" value="{{$products->feelayanan}}">
                                @error('feelayanan')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                              <div class="form-group mb-4">
                                  <label for="laba" class="block text-gray-700 font-bold mb-2">Laba</label>
                                  <input type="text" name="laba" id="laba" class="form-control border border-gray-300 p-2 rounded w-full currency" placeholder="Laba" value="{{$products->laba}}">
                                  @error('laba')
                                  <span class="text-danger">{{$message}}</span>
                                  @enderror
                              </div>
                              <div class="form-group mb-4">
                                <label for="hargacoret" class="block text-gray-700 font-bold mb-2">Hargacoret</label>
                                <input type="text" name="hargacoret" id="hargacoret" class="form-control border border-gray-300 p-2 rounded w-full currency" placeholder="Hargacoret" value="{{$products->hargacoret}}">
                                @error('hargacoret')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="iskhusus" class="block text-gray-700 font-bold mb-2">Iskhusus</label>
                                <select name="iskhusus" id="iskhusus" class="form-control border border-gray-300 p-2 rounded w-full">
                                    <option value="1" @if($products->iskhusus == 1) selected @endif>Yes</option>
                                    <option value="0" @if($products->iskhusus == 0) selected @endif>No</option>
                                </select>
                                @error('iskhusus')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                              <!-- Tambahkan input file untuk gambar utama -->
                            <div class="form-group mb-4">
                                <label for="gambarutama" class="block text-gray-700 font-bold mb-2">Gambarutama</label>
                                <input type="file" name="gambarutama" id="gambarutama" class="form-control border border-gray-300 p-2 rounded w-full">
                                @error('gambarutama')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                              <!-- Tambahkan input file untuk gambar-gambar tambahan -->
                              <div class="form-group mb-4">
                                <label for="gambar1" class="block text-gray-700 font-bold mb-2">Gambar1</label>
                                <input type="file" name="gambar1" id="gambar1" class="form-control border border-gray-300 p-2 rounded w-full">
                                @error('gambar1')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <!-- Tambahkan input file untuk gambar-gambar tambahan -->
                            <div class="form-group mb-4">
                                <label for="gambar2" class="block text-gray-700 font-bold mb-2">Gambar2</label>
                                <input type="file" name="gambar2" id="gambar2" class="form-control border border-gray-300 p-2 rounded w-full">
                                @error('gambar2')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <!-- Tambahkan input file untuk gambar-gambar tambahan -->
                            <div class="form-group mb-4">
                                <label for="gambar3" class="block text-gray-700 font-bold mb-2">Gambar3</label>
                                <input type="file" name="gambar3" id="gambar3" class="form-control border border-gray-300 p-2 rounded w-full">
                                @error('gambar3')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                              <button type="submit" class="btn btn-primary">
                                  Update
                              </button>
                          </form>
                          <p class="mt-4"><a href="{{ route('admin/superadmin/products') }}" class="btn btn-secondary">Go Back</a></p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

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

          document.getElementById('edit-product-form').addEventListener('submit', function (e) {
              currencyFields.forEach(field => {
                  field.value = field.value.replace(/[^\d]/g, '');
              });
          });
      });

      function formatCurrency(value) {
          return 'Rp ' + new Intl.NumberFormat('id-ID').format(value);
      }
  </script>
</x-app-layout>
