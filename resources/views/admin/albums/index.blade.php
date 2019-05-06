@extends('layouts.admin')

@section('content')
    <h1 class="section-title">Albums</h1>
    <button class="button my-3">
        <a href="/albums/create" class="text-white">Créer un album</a>
    </button>

    @foreach($categories as $category)
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" colspan="2">{{ $category->title }}</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach ($albums as $album)
                    @if ($album->category == $category->name)
                        <tr>
                            <th scope="row">
                                <a href="/photos/{{ $album->id }}" class="text-dark">{{ $album->title }}</a>
                            </th>
                            <td class="text-right">
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
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    @endforeach
@endsection