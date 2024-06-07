<!-- resources/views/admin/superadmin/articles/show.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $article->title }}
        </h2>
    </x-slot>

    <div class="flex">
        @include('components.sidebar')
        <div class="content" style="margin-left: 250px; padding: 20px; box-sizing: border-box; flex-grow: 1; background-color: #f7fafc;">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <h1 class="text-2xl font-bold">{{ $article->title }}</h1>
                            <div class="mt-4">
                                {!! $article->content !!}
                            </div>
                            <p class="mt-4"><a href="{{ route('articles.index') }}" class="btn btn-secondary">Go Back</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
