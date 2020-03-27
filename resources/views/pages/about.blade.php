@extends('layouts.app')

@section('title')
    A propos
@endsection

@section('content')
    <section id="about">
        <img class="img-fluid" src="/img/about/about.jpg" alt="Mu' Photos Photographe Nancy">

        <div class="about-text">
            <h2 class="section-title">Muriel</h2>
    
            <h3>25 ans, gymnaste passionnée<br>et passionnée de photographie. </h3>
    
            <p>J'ai toujours aimé les photos, pour garder un souvenir des instants
                passés. Pour pouvoir
                ouvrir
                tous ensemble, ou seul dans son canapé, ou autour de notre famille, l'album qui regroupe tous
                nos souvenirs de vie.</p>
    
            <p>Bref, j'aime les photos ! Alors en grandissant, j'ai appris à les faire
                par moi-même. La passion
                a grandit encore un peu plus ... Et j'ai décidé de faire le premier pas.</p>
    
            <p>Ainsi je suis devenue photographe professionnelle en 2014, tout d'abord
                pour la gymnastique !
                Depuis ce jour, j'ai diversifié mon activité. Désormais je vous propose des séances variées pour
                répondre à vos envies partager ensemble la joie et l'amour qui anime vos familles.</p>
        </div>
    </section>

    {{-- <section id="testimonials">
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
    </section> --}}
@endsection