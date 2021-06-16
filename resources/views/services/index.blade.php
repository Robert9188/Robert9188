@extends('Layouts.app')

@section('content')
    <div class="container mt-5">

        <h1>Our services</h1>

        @foreach ($services as $service)
        <div class="card mb-3">
            <div class="card-header">
                {{$service['name']}}
            </div>
            <div class="card-body">
                {{$service['description']}}
            </div>

            <div class="card-footer">
                <form action="/services/delete/{{$service['id']}}" method="post">
                    <button class="btn btn-danger" >Delete</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
@endsection
