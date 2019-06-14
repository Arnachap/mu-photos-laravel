@extends('layouts.app')

@section('title')
    Contact
@endsection

@section('content')
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="section-title">Contact</h2>
                </div>

                <div class="col-md-6">
                    {{ Form::open(['action' => 'ContactFormController@store', 'method' => 'POST', 'class' => 'contact-form']) }}
                        {{ Form::text('name', '', ['placeholder' => 'Votre nom']) }}

                        {{ Form::email('email', '', ['placeholder' => 'Votre e-mail']) }}

                        {{ Form::text('subject', '', ['placeholder' => 'Sujet']) }}

                        {{ Form::textarea('message', '', ['placeholder' => 'Message']) }}

                        {{ Form::button('Envoyer', ['class' => 'button', 'type' => 'submit']) }}
                    {{ Form::close() }}
                </div>

                <div class="col-md-6">
                    <h3 class="section-subtitle">Vous avez une idée en tête ou mieux ... Un projet ! N'hésitez pas à me
                        contacter par mail ou par téléphone en m'indiquant vos idées, vos envies, tout ce qui vous
                        semble important pour la réussite de votre projet. Je ferais de mon mieux pour vous répondre
                        dans les plus brefs délais.</h3>

                    <div class="contact-info">
                        <i class="fas fa-map-marked-alt"></i>
                        <p>66 Boulevard d'Haussonville, Nancy</p>
                    </div>

                    <div class="contact-info">
                        <i class="fas fa-mobile-alt"></i>
                        <p>06 32 23 05 29</p>
                    </div>

                    <div class="contact-info">
                        <i class="fas fa-paper-plane"></i>
                        <p>mu.photos@sfr.fr</p>
                    </div>

                    <div class="contact-info">
                        <p><span>SIRET</span> : 80086588300014</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection