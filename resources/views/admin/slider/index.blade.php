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

    {{ Form::open(['action' => 'SliderController@sort', 'method' => 'POST']) }}
        <div class="row" id="sortable">

            @foreach($slides as $slide)
                <div class="col-3">
                    <img src="/storage/slides/{{ $slide->filename }}" alt="Photo accueil {{ $slide->filename }} photographe Nancy" class="img-fluid">

                    <button type="button" class="btn btn-sm btn-danger" style="position: absolute; top: 5px; right: 20px;font-size: 10px; font-weight: bold" data-toggle="modal" data-target="#modal{{$slide->id}}">X</button>
                    
                    {{ Form::hidden('id[]', $slide->id) }}
                </div>
            @endforeach
        </div>

        <div class="row">
            {{ Form::submit('Sauvegarder l\'ordre des photos', ['class' => 'button my-2']) }}
        </div>
    {{ Form::close() }}


    @foreach($slides as $slide)
        <div class="modal fade" id="modal{{$slide->id}}" tabindex="-1" role="dialog" aria-labelledby="modal{{$slide->id}}Label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        {{ Form::open(['action' => ['SliderController@destroy', $slide->id], 'method' => 'POST']) }}
                            <p class="text-center">Etes-vous sur de vouloir supprimer la photo {{ $slide->filename }} ?</p>
                            {{ Form::hidden('_method', 'DELETE') }}
                            {{ Form::submit('Supprimer', ['class' => 'btn btn-danger d-block mx-auto']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection