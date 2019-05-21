@extends('layouts.admin')

@section('content')
    <h1 class="section-title">{{ $category->title }}</h1>

    {{ Form::open(['action' => ['AlbumsController@updateCategory', $category->id], 'method' => 'POST']) }}
        <div class="form-group">
            {{ Form::label('intro', 'Introduction :') }}
            <div id="editor"></div>
            {{ Form::hidden('intro', $category->intro, ['id' => 'intro', 'class' => 'form-control', 'rows' => '10']) }}
        </div>

        {{ Form::hidden('_method', 'PUT') }}
        {{ Form::submit('Modifier l\'introduction', ['class' => 'button']) }}
    {{ Form::close() }}
@endsection