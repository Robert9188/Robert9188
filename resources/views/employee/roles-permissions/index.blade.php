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
                                ['id' => route('employee.role.create'), 'content' => 'Ajouter Role'],
                                ['id' => route('employee.permission.create'), 'content' => 'Ajouter Permissions'],
                            ]
                        ])
                    </div>
                    <div class="col-span-5">
                        <div class="m-4">
                            <div class="container overflow-y-auto max-h-[65vh]">
                                <div class="mb-10">
                                    <h1 class="text-2xl text-indigo-500 font-bold text-center">{{__('Liste des Roles et Permissions disponibles')}}</h1>
                                </div>
                                <div id="roles-permissions" class="w-full flex flex-col items-center space-y-10 mt-10 mb-5">
                                    <div id="roles" class="w-4/5">
                                        <div class="my-2">
                                            <h1 class="text-2xl text-indigo-500 font-bold text-center underline">{{__('Liste des Roles')}}</h1>
                                        </div>
                                        <table class="table-fixed w-full">
                                            <thead>
                                            <tr>
                                                <th class="w-1/12 text-center">#</th>
                                                <th class="w-4/12 text-center">Name</th>
                                                <th class="w-5/12 text-center">Display Name</th>
                                                <th class="w-2/12 text-center"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($roles as $key => $role)
                                                    @if(($key+1) % 2 !== 0)
                                                        <tr class="bg-gray-50">
                                                            <td class="text-center py-4">{{$key+1}}</td>
                                                            <td class="text-center py-4">{{$role->name}}</td>
                                                            <td class="text-center py-4">{{$role->display_name}}</td>
                                                            <td class="text-center py-4">
                                                                <a href="{{route('employee.role.edit', $role)}}" class="text-blue-500 hover:focus:text-indigo-500 hover:focus:underline px-2 py-1">edit</a>
                                                            </td>
                                                        </tr>
                                                    @else
                                                        <tr class="">
                                                            <td class="text-center py-4">{{$key+1}}</td>
                                                            <td class="text-center py-4">{{$role->name}}</td>
                                                            <td class="text-center py-4">{{$role->display_name}}</td>
                                                            <td class="text-center py-4">
                                                                <a href="{{route('employee.role.edit', $role)}}" class="text-blue-500 hover:focus:text-indigo-500 hover:focus:underline px-2 py-1">edit</a>
                                                            </td>
                                                        </tr>
                                                    @endif

                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <div id="permissions" class="w-4/5">
                                        <div class="my-2">
                                            <h1 class="text-2xl text-indigo-500 font-bold text-center underline">{{__('Liste des Permissions')}}</h1>
                                        </div>
                                        <table class="table-fixed w-full">
                                            <thead>
                                            <tr>
                                                <th class="w-1/12 text-center">#</th>
                                                <th class="w-4/12 text-center">Name</th>
                                                <th class="w-5/12 text-center">Display Name</th>
                                                <th class="w-2/12 text-center"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($permissions as $key => $permission)
                                                @if(($key+1) % 2 !== 0)
                                                    <tr class="bg-gray-50">
                                                        <td class="text-center py-4">{{$key+1}}</td>
                                                        <td class="text-center py-4">{{$permission->name}}</td>
                                                        <td class="text-center py-4">{{$permission->display_name}}</td>
                                                        <td class="text-center py-4">
                                                            <a href="{{route('employee.permission.edit', $permission)}}" class="text-blue-500 hover:focus:text-indigo-500 hover:focus:underline px-2 py-1">edit</a>
                                                        </td>
                                                    </tr>
                                                @else
                                                    <tr class="">
                                                        <td class="text-center py-4">{{$key+1}}</td>
                                                        <td class="text-center py-4">{{$permission->name}}</td>
                                                        <td class="text-center py-4">{{$permission->display_name}}</td>
                                                        <td class="text-center py-4">
                                                            <a href="{{route('employee.permission.edit', $permission)}}" class="text-blue-500 hover:focus:text-indigo-500 hover:focus:underline px-2 py-1">edit</a>
                                                        </td>
                                                    </tr>
                                                @endif

                                            @endforeach
                                            </tbody>
                                        </table>
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
