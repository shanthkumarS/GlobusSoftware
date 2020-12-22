<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>
    <div class="article-container bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-2 lg:px-4">
            @if (! isset($post->id))
                <form method="POST" action='/post/store/{!!$user->id!!}'>
                    @csrf
            @else
                <form method="POST" action="/post/update/{!! $post->id !!}">
                    @csrf
            @endif
        
            <div>
                <x-label for="name" :value="__('Name')" />
                @if (! isset($post->name))
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" />                       
                @else
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{!! $post->name !!}" />                       
                @endif
                <span class="form-error">{!! $errors->first('name') !!}</span>
            </div>

            <div>
                <x-label for="content" :value="__('Description')" />
                @if (! isset($post->content))
                    <x-input id="content" class="text-area block mt-1 w-full" type="textarea" name="content" :value="old('description')" />                       
                @else
                    <x-input id="content" class="text-area block mt-1 w-full" type="textarea" name="content" value="{!! $post->description !!}" />                       
                @endif
                <span class="form-error">{!! $errors->first('content') !!}</span>
            </div>

            @if (isset($post->id))
                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-4">
                        {{ __('Update') }}
                    </x-button>
                </div>
            @else
                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-4">
                        {{ __('Add') }}
                    </x-button>
                </div>
            @endif
            </form>
        </div>
    </div>
    </div>
</x-app-layout>
