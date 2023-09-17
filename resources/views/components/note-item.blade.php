@props(['note' => null])
@php
    $backgroudList = ['bg-red-200', 'bg-blue-200', 'bg-green-200', 'bg-yellow-200', 'bg-pink-200'];
    $backgroudRandom = $backgroudList[array_rand($backgroudList, 1)];
@endphp
<div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 px-2 mb-4">
    <div class="{{ $backgroudRandom }} rounded-lg p-4 h-40 flex flex-col justify-between">
        <div>
            <div class="flex items-center justify-end">
                <form action="{{ route('note.destroy', ['note' => $note->id]) }}" method="Post">
                    <button type="submit">
                        <?xml version="1.0" encoding="utf-8"?><!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                        <svg width="18px" height="18px" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12Z"
                                stroke="#000000" stroke-width="2" />
                            <path d="M9 9L15 15M15 9L9 15" stroke="#000000" stroke-width="2" stroke-linecap="round" />
                        </svg>
                    </button>
                    @csrf
                    @method('DELETE')
                </form>
            </div>
            <p class="text-gray-700">
                {{ $note->content ?? null }}
            </p>
        </div>
        <div class="flex items-center justify-end font-bold">
            <p class="text-sm">{{ $note->created_at ?? null }}</p>
        </div>
    </div>
</div>
