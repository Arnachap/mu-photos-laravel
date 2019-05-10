@extends('layouts.admin')

@section('content')
    <h1 class="section-title">Albums Clients</h1>
    
    <button class="button my-3">
        <a href="/albums-clients/create" class="text-white">Créer un album client</a>
    </button>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Nom de l'album</th>
                <th scope="col">Client</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($albums as $album)
                <tr>
                    <th scope="row">{{ $album->title }}</th>
                    <td>
                        @foreach($users as $user)
                            @if($album->userId == $user->id)
                                {{ $user->name }}
                            @endif
                        @endforeach
                    </td>

                    <td class="text-right">
                        <a href="/albums-clients/{{ $album->id }}/edit">
                            <i class="far fa-edit text-primary"></i>
                        </a>

                        <button type="button" class="btn btn-link pt-0" style="border: none" data-toggle="modal" data-target="#modal{{$album->id}}">
                            <i class="fas fa-trash-alt text-danger"></i>
                        </button>

                        <div class="modal fade" id="modal{{$album->id}}" tabindex="-1" role="dialog" aria-labelledby="modal{{$album->id}}Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        {{ Form::open(['action' => ['PrivateAlbumsController@destroy', $album->id], 'method' => 'POST']) }}
                                            <p class="text-center">Etes-vous sur de vouloir supprimer l'album {{ $album->title }} ?</p>
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            {{ Form::submit('Supprimer', ['class' => 'btn btn-danger d-block mx-auto']) }}
                                        {{ Form::close() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection