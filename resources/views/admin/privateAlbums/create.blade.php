@extends('layouts.admin')

@section('content')
    <h1 class="section-title">Créer un album</h1>

    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                {{ Form::open(['action' => 'PrivateAlbumsController@store', 'method' => 'POST']) }}
                    <div class="form-group">
                        {{ Form::label('title', 'Titre :') }}
                        {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Titre de l\'album', 'autofocus']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('userId', 'Client :') }}

                        {{ Form::select('userId', $users, null, ['class' => 'form-control', 'placeholder' => 'Choisir un client...']) }}
                    </div>

                    {{ Form::submit('Créer l\'album', ['class' => 'button']) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection