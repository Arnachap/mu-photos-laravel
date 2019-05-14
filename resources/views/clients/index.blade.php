@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <h1 class="section-title">{{ $album->title }}</h1>
            </div>
        </div>

        <div class="row">
            <div class="m-p-g">
                <div class="m-p-g__thumbs" data-google-image-layout data-max-height="350">
                    @foreach ($photos as $photo)
                        <img 
                            src="/storage/private-photos/{{ $album->id }}/{{ $photo->photo }}"
                            data-full="/storage/private-photos/{{ $album->id }}/{{ $photo->photo }}"
                            alt="{{ $photo->photo }}" 
                            class="m-p-g__thumbs-img">
                    @endforeach
                </div>

                <div class="m-p-g__fullscreen"></div>
            </div>
        </div>
    </div>

    <script src='/js/material-photo-gallery.min.js'></script>
    <script>
        var elem = document.querySelector('.m-p-g');

        document.addEventListener('DOMContentLoaded', function () {
            var gallery = new MaterialPhotoGallery(elem);
        });
    </script>
@endsection