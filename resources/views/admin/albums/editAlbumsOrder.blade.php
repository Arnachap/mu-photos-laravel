@extends('layouts.admin')

@section('content')
    <h1 class="section-title">{{ $category->title }}</h1>

    {{ Form::open(['action' => 'AlbumsController@saveAlbumsOrder', 'method' => 'POST']) }}
        <div class="row" id="sortable">
            @foreach($albums as $album)
                <div class="col-3 mb-3">
                    <img src="/storage/thumbnails/{{ $album->thumbnail }}" alt="Photo Nancy" class="img-fluid">

                    <p class="text-center">{{ $album->title }}</p>

                    {{ Form::hidden('id[]', $album->id) }}
                </div>
            @endforeach
        </div>

        <div class="row">
            {{ Form::submit('Sauvegarder l\'ordre des albums', ['class' => 'button my-2']) }}
        </div>
    {{ Form::close() }}
@endsection