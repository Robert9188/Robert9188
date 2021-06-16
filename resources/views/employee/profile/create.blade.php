@extends('employee.layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex justify-center">
                <div class="w-2/3 container-md my-5 flex flex-col items-center">
                    <div class="w-full my-4 py-2">
                        <h1 class="text-2xl text-blue-500 text-center">{{__('Créer un compte à un personnel de votre Hopital')}}</h1>
                    </div>

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <div class="w-3/4">
                        <form method="POST" action="{{ route('employee.profile.store') }}">
                        @csrf

                        <!-- Fisrt and Last Name -->
                            <div>
                                <x-label for="first_name" :value="__('First Name')" />

                                <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus />
                            </div>

                            <div class="mt-4">
                                <x-label for="last_name" :value="__('Last Name')" />

                                <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus />
                            </div>

                            {{-- Phone --}}
                            <div class="mt-4">
                                <x-label for="phone" :value="__('Phone number')" />

                                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus />
                            </div>

                            <div class="mt-4">
                                <x-label for="role" :value="__('Role (Ex: Médecin)')" />

                                {{--<x-input id="role" class="block mt-1 w-full" type="text" name="role" :value="old('phone')" required autofocus />--}}
                                <select name="role"
                                        id="state"
                                    class = 'w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                                >
                                    @if($roles !== null)
                                        @foreach($roles as $role)
                                            <option value="{{$role}}">{{$role->name}}</option>
                                        @endforeach
                                    @endif
                                </select>

                            </div>

                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-label for="email" :value="__('Email')" />

                                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                            </div>

                            <!-- Password -->
                            <div class="mt-4">
                                <x-label for="password" :value="__('Password')" />

                                <x-input id="password" class="block mt-1 w-full"
                                         type="password"
                                         name="password"
                                         required autocomplete="new-password" />
                            </div>

                            <!-- Confirm Password -->
                            <div class="mt-4">
                                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                                <x-input id="password_confirmation" class="block mt-1 w-full"
                                         type="password"
                                         name="password_confirmation" required />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('employee.login') }}">
                                    {{ __('Already registered?') }}
                                </a>

                                <x-button class="ml-4">
                                    {{ __('Register') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
