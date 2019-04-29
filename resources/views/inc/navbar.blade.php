<nav class="navbar navbar-expand-lg fixed-top {{ Request::is('/') ? '' : 'navbar-shrink' }}" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img id="logo-img" src="/img/logo/logo-img{{ Request::is('/') ? '-white' : '' }}.png" alt="">
            <img id="logo-name" src="/img/logo/logo-name{{ Request::is('/') ? '-white' : '' }}.png" alt="">
        </a>

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Galerie
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/galerie/en-amoureux">En amoureux</a>
                        <a class="dropdown-item" href="/galerie/le-mariage">Le Mariage</a>
                        <a class="dropdown-item" href="/galerie/en-attendant-bebe">En attendant bébé</a>
                        <a class="dropdown-item" href="/galerie/les-premiers-jours">Les premiers jours</a>
                        <a class="dropdown-item" href="/galerie/le-bonheur-en-famille">Le bonheur en famille</a>
                        <a class="dropdown-item" href="/galerie/boudoir">Boudoir</a>
                        <a class="dropdown-item" href="/galerie/portraits">Portraits</a>
                        <a class="dropdown-item" href="/galerie/sport">Sport</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/a-propos">A propos</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Contact
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/prestations">Préstations</a>

                        <a class="dropdown-item" href="/contact">Contact</a>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="/connexion">Clients</a>
                </li>
            </ul>
        </div>
    </div>
</nav>