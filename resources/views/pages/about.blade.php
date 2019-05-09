@extends('layouts.app')

@section('content')
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="px-5">
                        <img class="img-fluid" src="./img/about/about.jpg" alt="">
                    </div>
                </div>

                <div class="col-md-6">
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
            </div>
        </div>
    </section>

    <section id="testimonials">
        <div class="container">
            <h2 class="section-title">Témoignages</h2>

            <div class="row text-center">
                <div class="col-md-4">
                    <div class="testimonial">
                        <div class="avatar mx-auto">
                            <img src="./img/testimonial/1.jpg" class="img-fluid" alt="">
                        </div>

                        <h4>Morgane & Baptiste</h4>

                        <p><i class="fas fa-quote-left"></i>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Quod eos id officiis hic tenetur quae quaerat ad velit ab hic tenetur.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="testimonial">
                        <div class="avatar mx-auto">
                            <img src="./img/testimonial/2.jpg" class="img-fluid" alt="">
                        </div>

                        <h4>Ramona & Michael</h4>

                        <p><i class="fas fa-quote-left"></i>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Quod eos id officiis hic tenetur quae quaerat ad velit ab hic tenetur.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="testimonial">
                        <div class="avatar mx-auto">
                            <img src="./img/testimonial/3.jpg" class="img-fluid" alt="">
                        </div>

                        <h4>Audrey & Cédrik</h4>

                        <p><i class="fas fa-quote-left"></i>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Quod eos id officiis hic tenetur quae quaerat ad velit ab hic tenetur.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection