<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-6 pb-2">
                <div class="bg-white p-3 rounded mb-3">
                    <form method="GET" action="{{ route('note.index') }}">
                        <x-text-input id="content" name="content" :value="app('request')->content ?? ''"/>
                        <div class="flex items-center justify-start mt-4">
                            <x-primary-button>
                                {{ __('Search') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
                <a href="{{ route('note.create') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="50px" height="50px">
                        <path
                            d="M 25 2 C 12.309295 2 2 12.309295 2 25 C 2 37.690705 12.309295 48 25 48 C 37.690705 48 48 37.690705 48 25 C 48 12.309295 37.690705 2 25 2 z M 25 4 C 36.609824 4 46 13.390176 46 25 C 46 36.609824 36.609824 46 25 46 C 13.390176 46 4 36.609824 4 25 C 4 13.390176 13.390176 4 25 4 z M 24 13 L 24 24 L 13 24 L 13 26 L 24 26 L 24 37 L 26 37 L 26 26 L 37 26 L 37 24 L 26 24 L 26 13 L 24 13 z" />
                    </svg>
                </a>
            </div>

            @if (session()->has('success'))
                <div class="px-6 w-9/12">
                    <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-3 mb-2 rounded relative"
                        role="alert">
                        <span class="block sm:inline">{{ session()->get('success') }}</span>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <svg class="fill-current h-6 w-6 text-green-500" role="button"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <title>Close</title>
                                <path
                                    d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                            </svg>
                        </span>
                    </div>
                </div>
            @endif

            @if (session()->has('error'))
                <div class="px-6 w-9/12">
                    <div class="bg-red-100 border border-red-400 text-red-700 px-6 py-3 mb-2 rounded relative"
                        role="alert">
                        <span class="block sm:inline">{{ session()->get('error') }}</span>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <svg class="fill-current h-6 w-6 text-red-500" role="button"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <title>Close</title>
                                <path
                                    d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                            </svg>
                        </span>
                    </div>
                </div>
            @endif

            <div class="overflow-hidden">
                @if (!empty($notes))
                    <div class="p-6 text-gray-900">
                        <div class="flex flex-wrap -mx-4">
                            @foreach ($notes as $note)
                                <x-note-item :note="$note"></x-note-item>
                            @endforeach
                        </div>

                        {{ $notes->links() }}
                    </div>
                @else
                    <div class="bg-white p-6 mx-6 rounded text-gray-900">
                        {{ __("No data found!") }}
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
