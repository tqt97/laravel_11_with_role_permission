<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-xl bold">Create Article</h2>
                    <form method="post" action="{{ route('articles.store') }}" class="mt-6 space-y-6">
                        @csrf
                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                                :value="old('title')" required autofocus autocomplete="title" />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>
                        <div>
                            <x-input-label for="content" :value="__('Content')" />
                            <x-text-area id="content" name="content" class="mt-1 block w-full"
                                required>{{ old('content') }}</x-text-area>
                            <x-input-error class="mt-2" :messages="$errors->get('content')" />
                        </div>
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input type="hidden" name="is_published" value="0">
                                <input id="is_published" name="is_published" type="checkbox" value="1"
                                    @checked(old('is_published'))
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mr-2">
                            </div>
                            <x-input-label for="is_published" :value="__('Published')" />
                        </div>
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
