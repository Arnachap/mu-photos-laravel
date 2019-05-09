@extends('layouts.admin')

@section('content')
    <h1 class="section-title">Clients</h1>
    
    <button class="button my-3">
        <a href="/register" class="text-white">Créer un compte client</a>
    </button>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Email</th>
                <th scope="col">Album</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>album</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection