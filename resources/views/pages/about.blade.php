@extends('layouts.app')

@section('title')
    A propos
@endsection

@section('content')
    <section id="about">
        <img class="img-fluid" src="/storage/about/{{ $about->photo }}" alt="Mu' Photos Photographe Nancy">

        <div class="about-text">
            <h2 class="section-title">Muriel</h2>
    
            <div class="text">
                {!! $about->body !!}
            </div>
        </div>
    </section>
@endsection