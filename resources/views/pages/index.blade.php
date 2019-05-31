@extends('layouts.app')

@section('title')
    Créatrice de souvenirs - Photographe professionnelle à Nancy
@endsection

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
                        <img src="/storage/slides/{{ $slide->filename }}" class="d-block w-100" alt="Photo Nancy accueil {{ $slide->filename }}">
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
                        <img class="img-fluid" src="/storage/photos/{{ $photoMariage->albumId }}/{{ $photoMariage->photo }}" alt="Mu' Photo, photographe mariage Nancy">

                        <a href="/galerie/le-mariage"></a>

                        <div class="caption">
                            <h3>Le Mariage</h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 p-1">
                    <div class="portfolio-link d-block">
                        <img class="img-fluid" src="/storage/photos/{{ $photoBebe->albumId }}/{{ $photoBebe->photo }}" alt="Mu' Photo, photographe naissance Nancy">

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
                            src="/storage/photos/{{ $photoAmoureux->albumId }}/{{ $photoAmoureux->photo }}" 
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
                            src="/storage/photos/{{ $photoGrossesse->albumId }}/{{ $photoGrossesse->photo }}"
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
                            src="/storage/photos/{{ $photoSport->albumId }}/{{ $photoSport->photo }}"
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
@endsection