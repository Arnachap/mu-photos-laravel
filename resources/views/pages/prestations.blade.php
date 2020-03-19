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
@endsection