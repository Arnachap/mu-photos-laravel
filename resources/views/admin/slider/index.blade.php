@extends('layouts.admin')

@section('content')
    <h1 class="section-title">Slider Accueil</h1>

    {{ Form::open(['action' => 'SliderController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
        <div class="form-group text-center">
            {{ Form::label('slide', 'Ajouter une photo à la page d\'accueil :') }}
            
            <br>

            {{ Form::file('slide') }}
        </div>    

        {{ Form::submit('Ajouter une photo', ['class' => 'button mb-5']) }}
    {{ Form::close() }}

    <div class="row">
            @foreach($slides as $slide)
                <div class="col-3">
                    <img src="/storage/slides/{{ $slide->filename }}" alt="" class="img-fluid">
                    {{ Form::open(['action' => ['SliderController@destroy', $slide->id], 'method' => 'POST']) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('X', ['class' => 'btn btn-sm btn-danger', 'style' => 'position: absolute; top: 5px; right: 20px;font-size: 10px; font-weight: bold']) }}
                    {{ Form::close() }}
                </div>
            @endforeach
        </div>
@endsection