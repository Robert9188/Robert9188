@extends('employee.layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
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
                                ['id' => '#enAttente', 'content' => 'en attente'],
                                ['id' => '#enCours', 'content' => 'en cours'],
                                ['id' => '#terminer', 'content' => 'terminere'],
                            ]
                        ])
                    </div>
                    <div class="col-span-5">
                        @include('employee.dashboard.content', ['dashContent' => [
                            'enAttente' => ['id' => 'attente', 'content' => 'Interactively fabricate bleeding-edge mindshare through principle-centered communities. Holisticly evisculate tactical technologies rather than tactical partnerships. Energistically leverage existing interactive convergence via client-focused scenarios. Enthusiastically utilize leading-edge strategic theme areas and customer directed expertise. Collaboratively.'],
                            'enCours' => ['id' => 'encours', 'content' => 'Interactively fabricate bleeding-edge mindshare through principle-centered communities. Holisticly evisculate tactical technologies rather than tactical partnerships. Energistically leverage existing interactive convergence via client-focused scenarios. Enthusiastically utilize leading-edge strategic theme areas and customer directed expertise. Collaboratively.'],
                            'terminer' => ['id' => 'terminer', 'content' => 'Interactively fabricate bleeding-edge mindshare through principle-centered communities. Holisticly evisculate tactical technologies rather than tactical partnerships. Energistically leverage existing interactive convergence via client-focused scenarios. Enthusiastically utilize leading-edge strategic theme areas and customer directed expertise. Collaboratively.'],
                        ]])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
