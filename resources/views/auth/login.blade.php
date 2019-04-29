@extends('layouts.app')

@section('content')
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="section-title">Connexion</h2>
                    <h3 class="section-subtitle">Veuillez vous connecter afin d'accéder à votre galerie personnelle.
                    </h3>
                </div>

                <div class="col-6 mx-auto">
                    <form class="contact-form" method="POST" action="{{ route('login') }}">
                        @csrf

                        <input id="name" type="text" name="name" placeholder="NOM" required autofocus>

                        <input id="password" type="password" placeholder="MOT DE PASSE" required>

                        <button type="submit" class="button">{{ __('Connexion') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection