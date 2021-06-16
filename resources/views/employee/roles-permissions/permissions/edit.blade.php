@extends('employee.layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Roles et Permissions') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-6 divide-x-2 divide-gary-500">
                    <div class="">
                        @include('employee.dashboard.sidebar', [
                            'sidebarLinks' => [
                                ['id' => route('employee.roles-permissions'), 'content' => 'Roles et Permissions'],
                                ['id' => route('employee.role.create'), 'content' => 'Ajouter Role'],
                                ['id' => route('employee.permission.create'), 'content' => 'Ajouter Permissions'],
                            ]
                        ])
                    </div>
                    <div class="col-span-5">
                        <div class="m-4">
                            <div class="container overflow-y-auto max-h-[65vh]">
                                <div class="flex flex-col items-center">
                                    <div class="w-full mb-10">
                                        <h1 class="text-2xl text-center text-indigo-500 font-bold uppercase">Update Permission</h1>
                                    </div>
                                    <div class="w-3/4">
                                        <form method="POST" action="{{ route('employee.permission.update', $permission) }}">
                                        @csrf

                                        <!-- Name and Display Name -->
                                            <div>
                                                <x-label for="name" :value="__('Name')" />

                                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $permission->name }}" required autofocus />
                                            </div>

                                            <div class="mt-4">
                                                <x-label for="display_name" :value="__('Display Name')" />

                                                <x-input id="display_name" class="block mt-1 w-full" type="text" name="display_name" value="{{ $permission->display_name }}" required autofocus />
                                            </div>

                                            <div class="mt-4">
                                                <x-label for="description" :value="__('Description')" />

                                                <textarea
                                                    id="description"
                                                    class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50block mt-1 w-full"
                                                    type="text" name="description"
                                                    value="{{ $permission->description }}" required autofocus placeholder="Permission's description">{{ $permission->description }}</textarea>
                                            </div>

                                            <div class="flex items-center justify-end mt-4">
                                                <x-button class="ml-4">
                                                    {{ __('Update') }}
                                                </x-button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
