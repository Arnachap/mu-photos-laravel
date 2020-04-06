@extends('layouts.admin')

@section('content')
    <h1 class="section-title">A propos</h1>

    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                {{ Form::open(['action' => 'AboutController@update', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                    <div class="form-group">
                        {{ Form::label('body', 'Texte :') }}

                        <div id="editor"></div>
                        {{ Form::hidden('body', $about->body, ['id' => 'intro', 'placeholder' => 'Texte', 'class' => 'form-control', 'rows' => '5']) }}
                    </div>
                    
                    <div class="form-group">
                        {{ Form::label('photo', 'Photo à propos :') }}
                        
                        <br>

                        {{ Form::file('photo') }}
                    </div>

                    {{ Form::hidden('_method', 'PUT') }}

                    {{ Form::submit('Modifier la page à propos', ['class' => 'button']) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection