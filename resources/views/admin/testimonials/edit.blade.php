@extends('layouts.admin')

@section('content')
    <h1 class="section-title">Modifier un témoignage</h1>

    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                {{ Form::open(['action' => ['TestimonialsController@update', $testimonial->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                    <div class="form-group">
                        {{ Form::label('title', 'Titre :') }}
                        {{ Form::text('title', $testimonial->title, ['class' => 'form-control', 'placeholder' => 'Titre du témoignage', 'autofocus']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('body', 'Témoignage :') }}
                        {{ Form::textarea('body', $testimonial->body, ['class' => 'form-control', 'placeholder' => 'Témoignage', 'rows' => '5']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('thumbnail', 'Image du témoignage :') }}
                        
                        <br>

                        {{ Form::file('thumbnail') }}

                        <br>

                        <small class="text-muted">Attention : l'image doit être carré.</small>
                    </div>

                    {{ Form::hidden('_method', 'PUT') }}

                    {{ Form::submit('Modifier le témoignage', ['class' => 'button mb-3']) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection