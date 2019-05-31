<nav class="navbar navbar-expand-lg fixed-top {{ Request::is('/') ? '' : 'navbar-shrink' }}" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img id="logo-img" src="/img/logo/logo-img{{ Request::is('/') ? '-white' : '' }}.png" alt="Logo Mu' Photos Photographe Nancy">
            <img id="logo-name" src="/img/logo/logo-name{{ Request::is('/') ? '-white' : '' }}.png" alt="Logo Mu' Photos Photographe Nancy">
        </a>

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link {{ Request::is('galerie/*') ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Galerie
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item {{ Request::is('galerie/en-amoureux') ? 'active' : '' }}" href="/galerie/en-amoureux">En amoureux</a>
                        <a class="dropdown-item {{ Request::is('galerie/le-mariage') ? 'active' : '' }}" href="/galerie/le-mariage">Le Mariage</a>
                        <a class="dropdown-item {{ Request::is('galerie/en-attendant-bebe') ? 'active' : '' }}" href="/galerie/en-attendant-bebe">En attendant bébé</a>
                        <a class="dropdown-item {{ Request::is('galerie/les-premiers-jours') ? 'active' : '' }}" href="/galerie/les-premiers-jours">Les premiers jours</a>
                        <a class="dropdown-item {{ Request::is('galerie/le-bonheur-en-famille') ? 'active' : '' }}" href="/galerie/le-bonheur-en-famille">Le bonheur en famille</a>
                        <a class="dropdown-item {{ Request::is('galerie/boudoir') ? 'active' : '' }}" href="/galerie/boudoir">Boudoir</a>
                        <a class="dropdown-item {{ Request::is('galerie/portraits') ? 'active' : '' }}" href="/galerie/portraits">Portraits</a>
                        <a class="dropdown-item {{ Request::is('galerie/sport') ? 'active' : '' }}" href="/galerie/sport">Sport</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('a-propos') ? 'active' : '' }}" href="/a-propos">A propos</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link {{ Request::is('contact') ? 'active' : '' }} {{ Request::is('prestations') ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Contact
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item {{ Request::is('prestations') ? 'active' : '' }}" href="/prestations">Préstations</a>

                        <a class="dropdown-item {{ Request::is('contact') ? 'active' : '' }}" href="/contact">Contact</a>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="/connexion">Clients</a>
                </li>
            </ul>
        </div>
    </div>
</nav>