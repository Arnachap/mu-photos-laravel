@extends('layouts.app')

@section('title')
    Préstations
@endsection

@section('content')
    <section>
        <div class="container-fluid">
            <h2 class="section-title">Ce que je vous propose...</h2>

            <div class="row">
                <div class="col">
                    <div class="prestation">
                        <a href="/galerie/les-premiers-jours">
                            <img src="/img/prestations/1.jpg" alt="Mu' Photo, photographe naissance Nancy">

                            <h3>Bout de chou</h3>
                        </a>

                        <p>Des photos de votre enfant,<br>dans son petit cocon.</p>

                        <p>Des souvenirs de<br>ces premiers jours avec vous.</p>

                        <p>Pensez-y aussi<br>pour les faire parts.</p>
                        
                        <p class="price">150 €</p>
                    </div>
                </div>

                <div class="col">
                    <div class="prestation">
                        <a href="/galerie/le-mariage">
                            <img src="/img/prestations/2.jpg" alt="Mu' Photo, photographe mariage Nancy">

                            <h3>Signature</h3>
                        </a>

                        <p>Créons ensemble un reportage photos qui vous ressemble,<br>des préparatifs à l'arrivée de la
                            pièce montée.</p>

                        <p>Des formules modulables<br>pour répondre à vos envies.</p>

                        <p>Pensez-y aussi<br>pour les faire parts.</p>

                        <p class="price">
                            <a href="/pdf/tarifs-mariage-2019.pdf" target="_blank">Découvrez<br>nos formules</a>
                        </p>
                    </div>
                </div>

                <div class="col">
                    <div class="prestation">
                        <a href="/galerie/boudoir">
                            <img src="/img/prestations/3.jpg" alt="Mu' Photo, photographe boudoir Nancy">

                            <h3>Boudoir</h3>
                        </a>

                        <p>Une séance photo à domicile,<br>tout en charme et en douceur.</p>

                        <p>Un moment privilégié pour exprimer sa féminité.</p>

                        <p>De quoi ravir votre coeur<br>et celui de votre moitié.</p>

                        <p class="price">120 €</p>
                    </div>
                </div>

                <div class="col">
                    <div class="prestation">
                        <a href="/galerie/en-attendant-bebe">
                            <img src="/img/prestations/4.jpg" alt="Mu' Photo, photographe grossesse Nancy">

                            <h3>Grossesse</h3>
                        </a>

                        <p>Un moment tout en douceur,<br>pour sublimer votre corps de future Maman.</p>

                        <p>Et garder à jamais des souvenirs de ce moment si particulier.</p>

                        <p class="price">100 €</p>
                    </div>
                </div>

                <div class="col">
                    <div class="prestation">
                        <a href="/galerie/le-bonheur-en-famille">
                            <img src="/img/prestations/5.jpg" alt="Mu' Photo, photographe famille Nancy">

                            <h3>Famille</h3>
                        </a>

                        <p>Un moment rempli de rires et de partage pour créer tous ensemble de jolis souvenirs de votre
                            tribu.</p>

                        <p>A offrir ou à s'offrir.</p>

                        <p class="price">100 €</p>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col prestation">
                </div>

                <div class="col prestation">
                </div>

                <div class="col prestation">
                </div>

                <div class="col prestation">
                </div>

                <div class="col prestation">
                </div>
            </div>
        </div>
    </section>
@endsection