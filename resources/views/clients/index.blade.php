@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1 class="section-title">{{ $album->title }}</h1>
        </div>

        <div class="row">
            @foreach($photos as $photo)
                <div class="col-3">
                    <img src="/storage/private-photos/{{ $album->id }}/{{ $photo->photo }}" alt="" class="img-fluid">
                </div>
            @endforeach
        </div>
    </div>
@endsection