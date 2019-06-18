@extends('layouts.app')

@section('title')
    Photos {{ $album->title }}
@endsection

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="section-title">{{$album->title}}</h2>
                    <h3 class="section-subtitle">{{$album->intro}}</h3>
                </div>
            </div>

            <div class="row">
                <div class="m-p-g">
                    <div class="m-p-g__thumbs" data-google-image-layout data-max-height="350">
                        @foreach ($photos as $photo)
                            <img 
                                src="/storage/photos/{{ $album->id }}/thumb_{{ $photo->photo }}"
                                data-full="/storage/photos/{{ $album->id }}/{{ $photo->photo }}"
                                alt="Photo {{ $photo->photo }} {{ $album->title }} Nancy" 
                                class="m-p-g__thumbs-img">
                        @endforeach
                    </div>

                    <div class="m-p-g__fullscreen"></div>
                </div>
            </div>
        </div>
    </section>
    <script src='/js/material-photo-gallery.min.js'></script>
    <script>
        var elem = document.querySelector('.m-p-g');

        document.addEventListener('DOMContentLoaded', function () {
            var gallery = new MaterialPhotoGallery(elem);
        });
    </script>
@endsection