<!-- resources/views/admin/superadmin/articles/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
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
                                <h1 class="text-2xl font-bold">Articles</h1>
                                <a href="{{ route('articles.create') }}" class="btn btn-primary">Create Article</a>
                            </div>
                            <table class="min-w-full bg-white divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($articles as $article)
                                    <tr>
                                        <td class="px-6 py-4 text-sm text-gray-900">{{ $article->title }}</td>
                                        <td class="px-6 py-4 text-sm font-medium">
                                            <a href="{{ route('articles.show', $article->id) }}" class="text-green-600 hover:text-green-900">Show</a>
                                            <a href="{{ route('articles.edit', $article->id) }}" class="text-indigo-600 hover:text-indigo-900 ml-4">Edit</a>
                                            <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900 ml-4">Delete</button>
                                            </form>
                                        </td>                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
