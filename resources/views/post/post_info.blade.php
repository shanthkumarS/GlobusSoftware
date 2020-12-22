<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $user->name }}
        </h2>
    </x-slot>

    <div class="m-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-20 bg-white border-b border-gray-200">
            <div class="container">
                <h3 class="text-primary">{{ $post->name }}</h3>
                <p class="text-dark">{{ $post->content }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
