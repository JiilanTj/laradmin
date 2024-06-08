<!-- resources/views/admin/superadmin/articles/create_edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ isset($article) ? 'Edit Article' : 'Create Article' }}
        </h2>
    </x-slot>

    <div class="flex">
        @include('components.sidebar')
        <div class="content" style="margin-left: 250px; padding: 20px; box-sizing: border-box; flex-grow: 1; background-color: #f7fafc;">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <form action="{{ isset($article) ? route('articles.update', $article->id) : route('articles.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if(isset($article))
                                    @method('PUT')
                                @endif
                                <div class="form-group mb-4">
                                    <label for="title" class="block text-gray-700 font-bold mb-2">Title</label>
                                    <input type="text" name="title" id="title" class="form-control border border-gray-300 p-2 rounded w-full" value="{{ isset($article) ? $article->title : old('title') }}">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="thumbnail" class="block text-gray-700 font-bold mb-2">Thumbnail Artikel</label>
                                    <input type="file" name="thumbnail" id="thumbnail" class="form-control border border-gray-300 p-2 rounded w-full">
                                    @error('thumbnail')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="content" class="block text-gray-700 font-bold mb-2">Content</label>
                                    <textarea name="content" id="content" rows="5" class="form-control border border-gray-300 p-2 rounded w-full">{{ isset($article) ? $article->content : old('content') }}</textarea>
                                    @error('content')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">{{ isset($article) ? 'Update' : 'Create' }}</button>
                            </form>
                            <p class="mt-4"><a href="{{ route('articles.index') }}" class="btn btn-secondary">Go Back</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content', {
            filebrowserUploadUrl: "{{ route('articles.upload', ['_token' => csrf_token() ]) }}",
            filebrowserUploadMethod: 'form'
        });

        // Mengatur CSS untuk tampilan dialog gambar
        document.addEventListener('DOMContentLoaded', () => {
            const dialog = document.querySelector('.cke_dialog_body_contents');
            if (dialog) {
                dialog.style.maxWidth = '600px'; // Sesuaikan dengan kebutuhan
                dialog.style.overflowX = 'auto'; // Munculkan scrollbar jika konten melebihi lebar
            }
        });
    </script>
</x-app-layout>
