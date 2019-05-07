@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="section-title">{{ $category->title }}</h2>
                    <h3 class="section-subtitle">{{ $category->intro }}</h3>
                </div>
            </div>

            <div class="row">
                @foreach($albums as $album)
                    <div class="col-4 p-1">
                        <div class="album-link">
                            <img class="img-fluid" src="/storage/thumbnails/{{ $album->thumbnail }}" alt="">

                            <a href="/albums/{{ $album->id }}"></a>

                            <div class="caption">
                                <h3>{{ $album->title }}</h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection