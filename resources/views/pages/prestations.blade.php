@extends('layouts.app')

@section('title')
    Prestations
@endsection

@section('content')
    <section>
        <div class="container-fluid">
            <h2 class="section-title">Ce que je vous propose...</h2>

            <div class="row">
                @foreach($prestations as $prestation)
                

                <div class="col">
                    <div class="prestation">
                        <a href="/galerie/les-premiers-jours">
                            <img src="/storage/prestations/{{$prestation->id}}.jpg" alt="Mu' Photo, photographe naissance Nancy">

                            <h3>{{$prestation->name}}</h3>
                        </a>

                        <div class="description">
                            {!!$prestation->description!!}
                        </div>
                        
                        @if($prestation->id !== 2)
                            <p class="price">{{$prestation->price}} €</p>
                        @else
                            <p class="price">
                                <a href="/storage/pdf/formule.pdf" target="_blank">Découvrez<br>nos formules</a>
                            </p>
                        @endif
                    </div>
                </div>
                @endforeach
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