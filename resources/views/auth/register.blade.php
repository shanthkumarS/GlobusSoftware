<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

            @if (! isset($user->id))
                <form method="POST" action="/register">
            @else
                <form method="POST" action="/employee/update/{!! $user->id !!}">
            @endif
        
            @csrf
            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />
                @if (! isset($user->name))
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" />                       
                @else
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{!! $user->name !!}" />                       
                @endif
                <span class="form-error">{!! $errors->first('name') !!}</span>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />
                @if (! isset($user->email))
                    <x-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" />                       
                @else
                    <x-input id="email" class="block mt-1 w-full" type="text" name="email" value="{!! $user->email !!}" />                       
                @endif
                <span class="form-error">{!! $errors->first('email') !!}</span>
            </div>
           
            <!-- Phone Number -->
            <div class="mt-4">
                <x-label for="phno" :value="__('Mobile Number')" />
                @if (! isset($user->phno))
                    <x-input id="phno" class="block mt-1 w-full" type="text" name="phno" :value="old('phno')" />                       
                @else
                    <x-input id="phno" class="block mt-1 w-full" type="text" name="phno" value="{!! $user->phno !!}" />                       
                @endif
                <span class="form-error">{!! $errors->first('phno') !!}</span>
            </div>

            @auth('admin')
                <!-- Designation -->
                <div class="mt-4">
                    <x-label for="designation" :value="__('Designation')" />
                    @if (! isset($user->designation))
                        <x-input id="designation" class="block mt-1 w-full" type="text" name="designation" :value="old('designation')" />                       
                    @else
                        <x-input id="designation" class="block mt-1 w-full" type="text" name="designation" value="{!! $user->designation !!}" />                       
                    @endif
                    <span class="form-error">{!! $errors->first('designation') !!}</span>
                </div>

                <!-- Salary -->
                <div class="mt-4">
                    <x-label for="salary" :value="__('Salary')" />
                    @if (! isset($user->salary))
                        <x-input id="salary" class="block mt-1 w-full" type="text" name="salary" :value="old('salary')" />                       
                    @else
                        <x-input id="salary" class="block mt-1 w-full" type="text" name="salary" value="{!! $user->salary !!}" />                       
                    @endif
                    <span class="form-error">{!! $errors->first('salary') !!}</span>
                </div>
            @endauth

            
            @guest
            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />
                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
                <span class="form-error">{!! $errors->first('password') !!}</span>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>
            
           
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
            @endguest

           @auth
           <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Update') }}
                </x-button>
            </div>
           @endauth
        </form>
    </x-auth-card>
</x-guest-layout>
