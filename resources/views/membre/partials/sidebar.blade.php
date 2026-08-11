<aside class="admin-sidebar">
  <div class="admin-logo">
    <img src="{{ asset('images/logo-afle.jpeg') }}" alt="Logo AFLE">
    <span>AFLE<em>Espace membre</em></span>
  </div>

  <nav class="admin-nav">
    <span class="admin-nav-label">Général</span>
    <a href="{{ route('membre.dashboard') }}" class="{{ request()->routeIs('membre.dashboard') ? 'active' : '' }}">
      <span class="ico">▦</span><span class="label">Tableau de bord</span>
    </a>
    <a href="{{ route('membre.profil') }}" class="{{ request()->routeIs('membre.profil') ? 'active' : '' }}">
      <span class="ico">◍</span><span class="label">Mon profil</span>
    </a>

    <span class="admin-nav-label">Communauté</span>
    <a href="" class="{{ request()->routeIs('membre.annuaire') ? 'active' : '' }}">
      <span class="ico">☰</span><span class="label">Annuaire des membres</span>
    </a>


  <a href="{{ route('membre.actualites') }}" class="{{ request()->routeIs('membre.actualites') ? 'active' : '' }}">
      <span class="ico">✎</span><span class="label">Actualités & Événements</span>
    </a>

    <a href="{{ route('membre.financement.index') }}" class="{{ request()->routeIs('membre.financement.*') ? 'active' : '' }}">
  <span class="ico">💰</span><span class="label">Demande de financement</span>
</a>
  </nav>

  <div class="admin-sidebar-bottom">
    <div class="admin-user">
      <strong>{{ auth()->user()->nomComplet() }}</strong>
      Membre AFLE
    </div>
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="admin-logout-btn">
        <span class="ico">⏻</span><span class="label">Déconnexion</span>
      </button>
    </form>
  </div>
</aside>