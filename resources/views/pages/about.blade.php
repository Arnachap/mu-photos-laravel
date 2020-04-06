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

    <section id="testimonials">
        <div class="container">
            <h2 class="section-title">Témoignages</h2>

            <div id="testimonialSlider" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                        @foreach($testimonials as $testimonial)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <div class="row text-center">
                                <div class="col-12">
                                    <div class="testimonial">
                                        <div class="avatar mx-auto">
                                            <img src="/storage/testimonials/{{ $testimonial->thumbnail }}" class="img-fluid" alt="Témoignage Mu' Photos Nancy {{ $testimonial->title }}">
                                        </div>
                
                                        <h4>{{ $testimonial->title }}</h4>
                
                                        <p><i class="fas fa-quote-left"></i>
                                            {{ $testimonial->body }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <a class="carousel-control-prev" href="#testimonialSlider" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>

                <a class="carousel-control-next" href="#testimonialSlider" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>
@endsection