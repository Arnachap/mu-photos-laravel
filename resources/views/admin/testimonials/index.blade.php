@extends('layouts.admin')

@section('content')
    <h1 class="section-title">Témoignages</h1>

    <button class="button my-3">
        <a href="/temoignages/create" class="text-white">Créer un témoignage</a>
    </button>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Titre du témoignage</th>
                <th scope="col"></th>
            </tr>
        </thead>

        <tbody>
            @foreach($testimonials as $testimonial)
                <tr>
                    <th scope="row">{{ $testimonial->title }}</th>

                    <td class="text-right">
                        <a href="/temoignages/{{ $testimonial->id }}/edit">
                            <i class="far fa-edit text-primary"></i>
                        </a>

                        <button type="button" class="btn btn-link pt-0" style="border: none" data-toggle="modal" data-target="#modal{{$testimonial->id}}">
                            <i class="fas fa-trash-alt text-danger"></i>
                        </button>

                        <div class="modal fade" id="modal{{$testimonial->id}}" tabindex="-1" role="dialog" aria-labelledby="modal{{$testimonial->id}}Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        {{ Form::open(['action' => ['TestimonialsController@destroy', $testimonial->id], 'method' => 'POST']) }}
                                            <p class="text-center">Etes-vous sur de vouloir supprimer le témoignage de {{ $testimonial->title }} ?</p>
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