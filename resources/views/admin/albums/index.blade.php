@extends('layouts.admin')

@section('content')
    <h1 class="section-title">Albums</h1>
    
    <button class="button my-3">
        <a href="/albums/create" class="text-white">Créer un album</a>
    </button>

    @foreach($categories as $category)
        <div class="row mb-3">
            <div class="col-12">
                <a class="btn btn-light btn-block text-left" data-toggle="collapse" href="#collapse{{ $category->id }}" role="button" aria-expanded="false" aria-controls="collapse{{ $category->id }}">
                        {{ $category->title }}
                </a>
            </div>
            
            <div class="collapse col-12" id="collapse{{ $category->id }}">
                <div class="card card-body">
                    <div class="col-12 mb-3">
                        <a href="/edit-category/{{ $category->id }}" class="text-primary">
                            <i class="far fa-edit"></i>
                            Modifier l'introduction
                        </a>

                        <a href="/edit-albums-order/{{ $category->id }}" class="text-primary ml-5">
                            <i class="fas fa-sort"></i>
                            Modifier l'ordre des albums
                        </a>
                    </div>

                    <div class="row">
                        @foreach ($category->albums as $album)
                                <div class="col-10">
                                    <i class="far {{ $album->public ? 'fa-play-circle text-success' : 'fa-pause-circle text-danger' }}"></i>
                                    <a href="/photos/{{ $album->id }}" class="text-dark">{{ $album->title }}</a>
                                </div>

                                <div class="col-2">
                                    <a href="/albums/{{ $album->id }}/edit">
                                        <i class="far fa-edit text-primary"></i>
                                    </a>
    
                                    <button type="button" class="btn btn-link pt-0" style="border: none" data-toggle="modal" data-target="#modal{{$album->id}}">
                                        <i class="fas fa-trash-alt text-danger"></i>
                                    </button>
    
                                    <div class="modal fade" id="modal{{$album->id}}" tabindex="-1" role="dialog" aria-labelledby="modal{{$album->id}}Label" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    {{ Form::open(['action' => ['AlbumsController@destroy', $album->id], 'method' => 'POST']) }}
                                                        <p class="text-center">Etes-vous sur de vouloir supprimer l'album {{ $album->title }} ?</p>
                                                        {{ Form::hidden('_method', 'DELETE') }}
                                                        {{ Form::submit('Supprimer', ['class' => 'btn btn-danger d-block mx-auto']) }}
                                                    {{ Form::close() }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <hr>
                                </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection