@extends('layouts.app')

@section('content')
    <header>
        <div id="headerSlider" class="carousel slide carousel-fade" data-ride="carousel" data-pause="false" data-interval="3000">
            <ol class="carousel-indicators">
                @foreach($slides as $index => $slide)
                    <li data-target="#headerSlider" data-slide-to="{{ $index }}" {{ $loop->first ? ' class=active' : '' }}></li>
                @endforeach
            </ol>

            <div class="carousel-inner">
                @foreach($slides as $slide)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <img src="/storage/slides/{{ $slide->filename }}" class="d-block w-100" alt="/img/slider1.jpg">
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
                    <div class="portfolio-link">
                        <img class="img-fluid" src="/img/home/mariage.jpg" alt="">

                        <a href="#"></a>

                        <div class="caption">
                            <h3>Le Mariage</h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 p-1">
                    <div class="portfolio-link">
                        <img class="img-fluid" src="/img/home/bébé.jpg" alt="">

                        <a href="#"></a>

                        <div class="caption">
                            <h3>Les Premiers Jours</h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 p-1">
                    <div class="portfolio-link">
                        <img class="img-fluid" src="/img/home/portrait.jpg" alt="">

                        <a href="#"></a>

                        <div class="caption">
                            <h3>Portraits</h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 p-1">
                    <div class="portfolio-link">
                        <img class="img-fluid" src="/img/home/famille.jpg" alt="">

                        <a href="#"></a>

                        <div class="caption">
                            <h3>En Famille</h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 p-1">
                    <div class="portfolio-link">
                        <img class="img-fluid" src="/img/home/boudoir.jpg" alt="">

                        <a href="#"></a>

                        <div class="caption">
                            <h3>Boudoir</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection