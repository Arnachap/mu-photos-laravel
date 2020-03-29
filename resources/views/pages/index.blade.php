@extends('layouts.app')

@section('title')
    Créatrice de souvenirs - Photographe professionnelle à Nancy
@endsection

@section('content')
    <header>
        <div id="headerSlider" class="carousel slide carousel-fade lazy" data-ride="carousel" data-pause="false" data-interval="3000">
            <ol class="carousel-indicators">
                @foreach($slides as $index => $slide)
                    <li data-target="#headerSlider" data-slide-to="{{ $index }}" {{ $loop->first ? ' class=active' : '' }}></li>
                @endforeach
            </ol>

            <div class="carousel-inner">
                @foreach($slides as $slide)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <img {{ $loop->first ? '' : 'data-' }}src="/storage/slides/{{ $slide->filename }}" class="d-block w-100" alt="Photo Nancy accueil {{ $slide->filename }}">
                    </div>
                @endforeach
            </div>
        </div>
    </header>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="section-title">Portfolio</h2>
                </div>

                <div class="col-md-6 p-1">
                    <div class="portfolio-link d-block">
                        <img class="img-fluid" src="/img/home/mariage.jpg" alt="Mu' Photo, photographe mariage Nancy">

                        <a href="/galerie/le-mariage"></a>

                        <div class="caption">
                            <h3>Le Mariage</h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 p-1">
                    <div class="portfolio-link d-block">
                        <img class="img-fluid" src="/img/home/bebe.jpg" alt="Mu' Photo, photographe naissance Nancy">

                        <a href="/galerie/les-premiers-jours"></a>

                        <div class="caption">
                            <h3>Les Premiers Jours</h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 p-1">
                    <div class="portfolio-link d-block">
                        <img 
                            class="img-fluid" 
                            src="/img/home/amoureux.jpg" 
                            alt="Mu' Photo, photographe couples Nancy">

                        <a href="/galerie/en-amoureux"></a>

                        <div class="caption">
                            <h3>En amoureux</h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 p-1">
                    <div class="portfolio-link d-block">
                        <img
                            class="img-fluid"
                            src="/img/home/grossesse.jpg"
                            alt="Mu' Photo, photographe grossesse Nancy">

                        <a href="/galerie/en-attendant-bebe"></a>

                        <div class="caption">
                            <h3>En attendant bébé</h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 p-1">
                    <div class="portfolio-link d-block">
                        <img
                            class="img-fluid"
                            src="/img/home/sport.jpg"
                            alt="Mu' Photo, photographe sport Nancy">

                        <a href="/galerie/sport"></a>

                        <div class="caption">
                            <h3>Sport</h3>
                        </div>
                    </div>
                </div>
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