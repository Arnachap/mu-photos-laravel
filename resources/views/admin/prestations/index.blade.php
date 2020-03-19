@extends('layouts.admin')

@section('content')
    <h1 class="section-title">Prestations</h1>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Prestation</th>
                <th scope="col" class="text-right">Modifier</th>
            </tr>
        </thead>
        <tbody>
            @foreach($prestations as $prestation)
                <tr>
                    <th scope="row">
                        <a href="/prestations/{{ $prestation->id }}/edit" class="text-dark">
                            {{ $prestation->name }}
                        </a>
                    </th>
                    <td class="text-right">
                        <a href="/prestations/{{ $prestation->id }}/edit">
                            <i class="far fa-edit text-primary"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection