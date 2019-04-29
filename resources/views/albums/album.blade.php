@extends('layouts.app')

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
                        <img src="/img/album/2.jpg" data-full="/img/album/2.jpg" class="m-p-g__thumbs-img">
                        <img src="/img/album/1.jpg" data-full="/img/album/1.jpg" class="m-p-g__thumbs-img">
                        <img src="/img/album/3.jpg" data-full="/img/album/3.jpg" class="m-p-g__thumbs-img">
                        <img src="/img/album/4.jpg" data-full="/img/album/4.jpg" class="m-p-g__thumbs-img">
                        <img src="/img/album/5.jpg" data-full="/img/album/5.jpg" class="m-p-g__thumbs-img">
                        <img src="/img/album/6.jpg" data-full="/img/album/6.jpg" class="m-p-g__thumbs-img">
                        <img src="/img/album/9.jpg" data-full="/img/album/9.jpg" class="m-p-g__thumbs-img">
                        <img src="/img/album/7.jpg" data-full="/img/album/7.jpg" class="m-p-g__thumbs-img">
                        <img src="/img/album/8.jpg" data-full="/img/album/8.jpg" class="m-p-g__thumbs-img">
                        <img src="/img/album/9.jpg" data-full="/img/album/9.jpg" class="m-p-g__thumbs-img">
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