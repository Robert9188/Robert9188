@extends('Layouts.wapp', ['pageTitle' => 'Welcome Page'])

@section('content')
    <div class="homeBanner">
        <div class="bannerMainTextContainer">
            <h1 class="display-4 mb-3">Bienvenue page</h1>
            <p class="lead text-justify mb-5">Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu'il est prêt ou que la mise en page est achevée. Généralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.</p>
            <a href="{{route('rendez-vous.index')}}" class="btn btn-success bannerCallToActionBtn">Prendre un Rendez-vous</a>
        </div>
    </div>
@endsection
