@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-6 mx-auto">
                <div class="jumbotron my-3">
                    <h1>Aucun album trouvé.</h1>
                    <p class="lead">Votre album photo n'est pas encore en ligne. Un email vous sera envoyé une fois l'album publié.</p>
                    <hr class="my-4">
                    <p>Si vous n'arivez pas à accéder à votre album après avoir reçu cette confirmation, merci de nous contacter <a href="/contact">ici</a>.</p>
                    <button class="button">
                        <a class="text-white" href="/">Retour à l'accueil</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection