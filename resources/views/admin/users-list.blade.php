<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <span id="user-delete-error" style="display:none" class="delete-error">Sorry ! Unable to delete User</span>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-4">
                        {{ __('Download Csv Report') }}
                    </x-button>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container">         
                        <table class="table">
                          <thead>
                            <tr>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Phone Number') }}</th>
                                <th>{{ __('Designation') }}</th>
                                <th>{{ __('Salary') }}</th>
                                <th> {{__('Action')}} </th>
                            </tr>
                          </thead>
                          <tbody>
                              @isset($users)
                                @foreach ($users as $user)
                                <tr id="user-{{ $user->id }}">
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phno }}</td>
                                    <td>{{ $user->designation }}</td>
                                    <td>{{ $user->salary }}</td>
                                    <td>
                                        <a href="/employee/edit/{{ $user->id }}" >{{__('Update')}}</a><br>
                                        <a href="/employee/show/{{ $user->id }}" >{{__('View')}}</a><br>
                                        <a id="{{ $user->id }}" class="deleteEmployee">{{__('Delete')}}</a><br>
                                    </td>
                                </tr>
                                @endforeach
                              @endisset
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
