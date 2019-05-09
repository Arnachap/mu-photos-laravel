@extends('layouts.app')

@section('content')
    <header>
        <div id="headerSlider" class="carousel slide carousel-fade" data-ride="carousel" data-pause="false" data-interval="2000">
            <ol class="carousel-indicators">
                <li data-target="#headerSlider" data-slide-to="0" class="active"></li>
                <li data-target="#headerSlider" data-slide-to="1"></li>
                <li data-target="#headerSlider" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/img/home/slider1.jpg" class="d-block w-100" alt="/img/slider1.jpg">
                </div>
                <div class="carousel-item">
                    <img src="/img/home/slider2.jpg" class="d-block w-100" alt="/img/slider1.jpg">
                </div>
                <div class="carousel-item">
                    <img src="/img/home/slider3.jpg" class="d-block w-100" alt="/img/slider1.jpg">
                </div>
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