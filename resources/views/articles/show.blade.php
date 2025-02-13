<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show article') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h1 class="font-bold text-center">Article Detail</h1>
                <div class="p-6 text-gray-900">
                    <div class="w-full p-4 bg-white border shadow rounded">
                        <h3 class="font-bold text-xl text-blue-500">
                            <a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a>
                        </h3>
                        <h5 class="text-sm mb-3">by {{ $article->author->name ?? 'anonymous' }}</h5>
                        <div class="text-sm border-t py-2">
                            {!! $article->content !!}
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <a href="{{ route('articles.index') }}">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
