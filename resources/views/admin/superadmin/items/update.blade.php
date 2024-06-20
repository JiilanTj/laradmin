<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Edit Items') }}
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
                              <h1 class="text-2xl font-bold">Edit Item</h1>
                          </div>
                          <hr class="my-4" />
                          <form action="{{ route('admin/superadmin/items/update', $items->id) }}" method="POST" enctype="multipart/form-data" id="edit-product-form">
                              @csrf
                              @method('PUT')
                              <div class="form-group mb-4">
                                  <label for="nama_item" class="block text-gray-700 font-bold mb-2">Item Name</label>
                                  <input type="text" name="nama_item" id="nama_item" class="form-control border border-gray-300 p-2 rounded w-full" placeholder="Item" value="{{$items->nama_item}}">
                                  @error('nama_item')
                                  <span class="text-danger">{{$message}}</span>
                                  @enderror
                              </div>
                              <div class="form-group mb-4">
                                  <label for="stok" class="block text-gray-700 font-bold mb-2">Stock</label>
                                  <input type="number" name="stok" id="stok" class="form-control border border-gray-300 p-2 rounded w-full" placeholder="stok" value="{{$items->stok}}">
                                  @error('stok')
                                  <span class="text-danger">{{$message}}</span>
                                  @enderror
                              </div>
                              <button type="submit" class="btn btn-primary">
                                  Update
                              </button>
                          </form>
                          <p class="mt-4"><a href="{{ route('admin/superadmin/items') }}" class="btn btn-secondary">Go Back</a></p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
