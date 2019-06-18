@extends('layouts.admin')

@section('content')
    <h1 class="section-title">{{ $album->title }}</h1>

    {{ Form::open(['action' => 'PhotosController@addPhotos', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
        <div class="form-group text-center">
            {{ Form::label('photos', 'Ajouter des photos à l\'album :') }}
            
            <br>

            {{ Form::file('photos[]', ['multiple' => 'true']) }}
        </div>

        {{ Form::hidden('albumId', $album->id) }}
        
        {{ Form::submit('Ajouter les photos', ['class' => 'button mb-5']) }}
    {{ Form::close() }}

    {{ Form::open(['action' => 'PhotosController@sort', 'method' => 'POST']) }}
        <div class="row" id="sortable">
            @foreach($photos as $photo)
                <div class="col-3 mb-3">
                    <img src="/storage/photos/{{ $album->id }}/thumb_{{ $photo->photo }}" alt="Photo {{ $album->title }} {{ $album->category }} {{ $photo->photo }} Nancy" class="img-fluid">

                    <button type="button" class="btn btn-sm btn-danger" style="position: absolute; top: 5px; right: 20px;font-size: 10px; font-weight: bold" data-toggle="modal" data-target="#modal{{$photo->id}}">X</button>

                    {{ Form::hidden('id[]', $photo->id) }}
                </div>
            @endforeach
        </div>

        <div class="row">
            {{ Form::submit('Sauvegarder l\'ordre des photos', ['class' => 'button my-2']) }}
        </div>
    {{ Form::close() }}

    @foreach($photos as $photo)
        <div class="modal fade" id="modal{{$photo->id}}" tabindex="-1" role="dialog" aria-labelledby="modal{{$photo->id}}Label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        {{ Form::open(['action' => ['PhotosController@destroy', $photo->id], 'method' => 'POST']) }}
                            <p class="text-center">Etes-vous sur de vouloir supprimer la photo {{ $photo->photo }} ?</p>
                            {{ Form::hidden('_method', 'DELETE') }}
                            {{ Form::submit('Supprimer', ['class' => 'btn btn-danger d-block mx-auto']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection