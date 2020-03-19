@extends('layouts.admin')

@section('content')
    <h1 class="section-title">Modifier {{$prestation->name}}</h1>

    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                {{ Form::open(['action' => ['PrestationsController@update', $prestation->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                    <div class="form-group">
                        {{ Form::label('name', 'Nom de la prestation :') }}

                        {{ Form::text('name', $prestation->name, ['class' => 'form-control', 'placeholder' => 'Nom de la prestation', 'autofocus']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('intro', 'Description :') }}

                        <div id="editor"></div>
                        {{ Form::hidden('intro', $prestation->description, ['id' => 'intro', 'class' => 'form-control', 'rows' => '5']) }}
                    </div>

                    @if ($prestation->id !== 2)
                        <div class="form-group">
                            {{ Form::label('price', 'Prix :') }}

                            {{ Form::number('price', $prestation->price, ['class' => 'form-control']) }}
                        </div>

                    @else
                        <div class="form-group">
                            {{ Form::label('pdf', 'PDF :') }}
                            
                            <br>

                            {{ Form::file('pdf') }}
                        </div>
                    @endif
                    
                    <div class="form-group">
                        {{ Form::label('thumbnail', 'Photo :') }}
                        
                        <br>

                        {{ Form::file('thumbnail') }}

                        <br>

                        <small class="text-muted">Attention : maximum 2Mo</small>
                    </div>

                    {{ Form::hidden('_method', 'PUT') }}

                    {{ Form::submit('Modifier la prestation', ['class' => 'button']) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection