<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           @auth('admin')
                {{ __('admin') }}
           @endauth
           @auth('web')
                {{ Auth::user()->name }}
           @endauth
        </h2>
    </x-slot>
    @auth
    <div class="py-12 article-container">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($posts as $post)
            <div class="m-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @auth('admin')
                    <div class="flex items-center justify-end mt-4">
                            <a href="admin/post/banned/{{ $post->id }}" >
                                <x-button class="ml-4">
                                    {{ __('Banned Users') }}
                                </x-button>
                            </a>
                    </div>
                @endauth
                <div class="p-20 bg-white border-b border-gray-200">
                    <div class="container">
                        <h3 class="text-primary">{{ $post->name }}</h3>
                        <p class="text-dark">{{ $post->content }}</p>
                    </div>
                    <div class="comment-container">
                        <h5>Comments</h5>
                    @foreach ($post->comments as $comment)
                    @isset($comment->user->name)
                        <h6 class="text-info text-md">{{ $comment->user->name }}<h6>
                        <div class="container text-sm">
                            <p class="text-muted">{{ $comment->comment }}</p>
                        </div>
                    @endisset
                    @endforeach
                    </div>
                    @auth('web')
                        <form method="POST" action="comment/add/{{$user->id}}/{{$post->id}}">
                        @csrf
                        <div>
                            <x-input id="comment" class="block mt-1 w-full" type="text" name="comment" :value="old('comment')" />
                            <span class="form-error">{!! $errors->first('comment') !!}</span>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                                <x-button class="ml-4">
                                    {{ __('Comment') }}
                                </x-button>
                            </div>
                        </form>
                    @endauth
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endauth
</x-app-layout>
