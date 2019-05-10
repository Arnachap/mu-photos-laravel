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

    <div class="row">
        @foreach($photos as $photo)
            <div class="col-3">
                <img src="/storage/photos/{{ $album->id }}/{{ $photo->photo }}" alt="" class="img-fluid">
                {{ Form::open(['action' => ['PhotosController@destroy', $photo->id], 'method' => 'POST']) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('X', ['class' => 'btn btn-sm btn-danger', 'style' => 'position: absolute; top: 5px; right: 20px;font-size: 10px; font-weight: bold']) }}
                {{ Form::close() }}
            </div>
        @endforeach
    </div>
@endsection