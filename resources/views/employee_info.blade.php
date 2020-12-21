<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container">         
                        <table class="table">
                          <tbody>
                                <tr>
                                    <td>{{__('Name')}}</td>
                                    <td>{{ $user->name }}</td>
                                </tr>

                                <tr>
                                    <td>{{__('Email')}}</td>
                                    <td>{{ $user->email }}</td>
                                </tr>

                                <tr>
                                    <td>{{__('Phone Number')}}</td>
                                    <td>{{ $user->phno }}</td>
                                </tr>

                                <tr>
                                    <td>{{__('Designation')}}</td>
                                    <td>{{ $user->designation }}</td>
                                </tr>

                                <tr>
                                    <td>{{__('Salary')}}</td>
                                    <td>{{ $user->salary }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
