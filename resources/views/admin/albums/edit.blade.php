@extends('layouts.admin')

@section('content')
    <h1 class="section-title">Modifier un album</h1>

    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                {{ Form::open(['action' => ['AlbumsController@update', $album->id], 'method' => 'POST']) }}
                    <div class="form-group">
                        {{ Form::label('title', 'Titre :') }}
                        {{ Form::text('title', $album->title, ['class' => 'form-control', 'placeholder' => 'Titre de l\'album', 'autofocus']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('intro', 'Introduction :') }}
                        {{ Form::textarea('intro', $album->intro, ['class' => 'form-control', 'placeholder' => 'Introduction', 'rows' => '3']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('category', 'Catégorie :') }}

                        {{ Form::select('category', [
                            'en-amoureux' => 'En amoureux',
                            'le-mariage' => 'Le mariage',
                            'en-attendant-bebe' => 'En attendant bébé',
                            'les-premiers-jours' => 'Les premiers jours',
                            'le-bonheur-en-famille' => 'Le bonheur en famille',
                            'boudoir' => 'Boudoir',
                            'portrait' => 'Portrait',
                            'sport' => 'Sport'
                        ], $album->category, ['class' => 'form-control', 'placeholder' => 'Choisir une catégorie...']) }}
                    </div>

                    {{ Form::hidden('_method', 'PUT') }}

                    {{ Form::submit('Créer l\'album', ['class' => 'button']) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection