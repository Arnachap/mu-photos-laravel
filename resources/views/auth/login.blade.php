@extends('layouts.app')

@section('title')
    Connexion
@endsection

@section('content')
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="section-title">Connexion</h2>
                    <h3 class="section-subtitle">Veuillez vous connecter afin d'accéder à votre galerie personnelle.</h3>
                </div>

                <div class="col-6 mx-auto">
                    <form class="contact-form" method="POST" action="{{ route('login') }}">
                        @csrf

                        <input id="email" type="email" name="email" class="@error('email') is-invalid @enderror" placeholder="EMAIL" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="MOT DE PASSE">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <button type="submit" class="button">{{ __('Connexion') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
