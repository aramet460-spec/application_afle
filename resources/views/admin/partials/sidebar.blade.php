<aside class="admin-sidebar">
  <div class="admin-logo">
    <img src="{{ asset('images/logo-afle.jpeg') }}" alt="Logo AFLE">
    <span>AFLE<em>Espace admin</em></span>
  </div>

  <nav class="admin-nav">
    <span class="admin-nav-label">Général</span>
    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
      <span class="ico">▦</span><span class="label">Tableau de bord</span>
    </a>

    <span class="admin-nav-label">Membres</span>
    <a href="{{ route('admin.membres') }}" class="{{ request()->routeIs('admin.membres') ? 'active' : '' }}">
      <span class="ico">◍</span><span class="label">Liste des membres</span>
    </a>

    <span class="admin-nav-label">Contenus</span>
    <a href="{{ route('admin.actualites.index') }}" class="{{ request()->routeIs('admin.actualites.*') ? 'active' : '' }}">
      <span class="ico">✎</span><span class="label">Actualités & Événements</span>
    </a>
    
    <span class="admin-nav-label">Financement</span>
<a href="{{ route('admin.financement.index') }}" class="{{ request()->routeIs('admin.financement.*') ? 'active' : '' }}">
  <span class="ico">💰</span><span class="label">Demandes de financement</span>
</a>
  </nav>

  <div class="admin-sidebar-bottom">
    <div class="admin-user">
      <strong>{{ auth()->user()->nomComplet() }}</strong>
      Administrateur
    </div>
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="admin-logout-btn">
        <span class="ico">⏻</span><span class="label">Déconnexion</span>
      </button>
    </form>
  </div>
</aside>