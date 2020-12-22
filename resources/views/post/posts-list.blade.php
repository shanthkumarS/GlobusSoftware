<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('POST') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <span id="delete-error" style="display:none" class="delete-error">Sorry ! Unable to delete User</span>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex items-center mt-4">
                        <form method="POST" action={{ Route('post.create') }}>
                            @csrf
                            <x-button class="ml-4" >
                            {{ __('Add Post') }}
                        </x-button>
                        </form>
                    </div>
                    <div class="container">         
                        <table class="table">
                          <thead>
                            <tr class="d-flex">
                                <th class="col-3">{{ __('Name') }}</th>
                                <th class="col-5">{{ __('Content') }}</th>
                                <th class="col-2">{{ __('Posted by') }}</th>
                                <th class="col-1">{{ __('Posted on') }}</th>
                                <th class="col-1"> {{__('Action')}} </th>
                            </tr>
                          </thead>
                          <tbody>
                                @isset($posts)
                                    @foreach ($posts as $post)
                                    <tr class="d-flex" id="post-{{ $post->id }}">
                                        <td class="col-3">{{ $post->name }}</td>
                                        <td class="col-5">{{ $post->content }}</td>
                                        <td class="col-2">
                                            @isset($post->user->name)
                                                {{ $post->user->name }}
                                            @endisset
                                        </td>
                                        <td class="col-1">{{ $post->created_on }}</td>               
                                        <td class="col-1">
                                            <a href="/post/edit/{{ $post->id }}" >{{__('Update')}}</a><br>
                                            <a href="/post/show/{{ $post->id }}" >{{__('View')}}</a><br>
                                            <a id="{{ $post->id }}" class="deletePost">{{__('Delete')}}</a><br>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @empty($posts)
                                        <tr>
                                            <td>Posts not found.</td>
                                        </tr>
                                    @endempty
                                @endisset
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
