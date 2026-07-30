<header>
  <nav class="wrap">
    <div class="logo">
      <span class="logo-mark">
        <img src="{{ asset('images/logo-afle.jpeg') }}" alt="Logo AFLE - Alliance des Femmes Leaders et Entrepreneures">
      </span>
    </div>
    <div class="navlinks">
      <a href="{{ url('/') }}#accueil">Accueil</a>
      <a href="{{ url('/') }}#apropos">À propos</a>
      <a href="{{ url('/') }}#actualites">Événements & Actualités</a>
      <a href="{{ url('/') }}#entrepreneures">Entrepreneures</a>
      <a href="{{ url('/') }}#contact">Contact</a>
    </div>
    <div class="btn-group">
      <a href="{{ route('login') }}" class="btn-login">Se connecter</a>
      <a href="{{ route('register') }}" class="nav-cta">Devenir membre</a>
    </div>
    <button class="burger" id="burgerBtn" aria-expanded="false" aria-controls="mobilePanel" aria-label="Ouvrir le menu">
      <span></span><span></span><span></span>
    </button>
  </nav>

  <div class="mobile-panel" id="mobilePanel">
    <div class="wrap">
      <a href="{{ url('/') }}#accueil">Accueil</a>
      <a href="{{ url('/') }}#apropos">À propos</a>
      <a href="{{ url('/') }}#evenements">Événements & Actualités</a>
      <a href="{{ url('/') }}#entrepreneures">Entrepreneures</a>
      <a href="{{ url('/') }}#contact">Contact</a>
    </div>
  </div>
</header>
<div class="motif"></div>