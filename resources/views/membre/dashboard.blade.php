<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Mon espace — AFLE Digital</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,600;9..144,700&family=Work+Sans:wght@400;500;600;700&family=JetBrains+Mono:wght@500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<div class="admin-layout">

  @include('membre.partials.sidebar')

  <main class="admin-main">

    <div class="admin-topbar">
      <div>
        <span class="eyebrow">Espace membre</span>
        <h1>Bonjour, {{ $user->prenom }} 👋</h1>
        <p>Voici ta carte membre et un aperçu de la communauté AFLE.</p>
      </div>
    </div>

    <!-- CARTE MEMBRE NUMERIQUE -->
    <div class="membre-card">
      <div class="avatar">
        @if ($user->photo_profil)
          <img src="{{ asset('storage/'.$user->photo_profil) }}" alt="Photo de {{ $user->nomComplet() }}">
        @else
          <div class="initials">{{ strtoupper(substr($user->prenom, 0, 1).substr($user->nom, 0, 1)) }}</div>
        @endif
      </div>
      <div class="infos">
        <div class="name">{{ $user->nomComplet() }}</div>
        <div class="role">{{ $user->profession ?? 'Membre AFLE' }}{{ $user->entreprise ? ' — '.$user->entreprise : '' }}</div>
        <div class="meta">{{ $user->ville }}, {{ $user->pays }} · Membre depuis {{ $user->created_at->format('M Y') }}</div>
      </div>
      <div class="num">
        Carte membre
        <strong>AFLE-{{ str_pad($user->id, 5, '0', STR_PAD_LEFT) }}</strong>
      </div>
    </div>

    <!-- CHIFFRES -->
    <div class="admin-stats-grid" style="grid-template-columns:repeat(3, 1fr);">
      <div class="admin-card">
        <div class="num">{{ $nombreMembres }}</div>
        <div class="label">Membres du réseau AFLE</div>
      </div>
      <div class="admin-card">
        <a href="" style="text-decoration:none; color:inherit;">
          <div class="num">0</div>
          <div class="label">Événements à venir</div>
        </a>
      </div>
      <div class="admin-card">
        <a href="" style="text-decoration:none; color:inherit;">
          <div class="num">0</div>
          <div class="label">Actualités récentes</div>
        </a>
      </div>
    </div>

    <div class="admin-panels" style="grid-template-columns:1fr 1fr;">
      <div class="admin-panel">
        <h2>Opportunités disponibles</h2>
        <div class="admin-empty">Aucune opportunité pour le moment — reviens bientôt.</div>
      </div>
      <div class="admin-panel">
        <h2>Notifications</h2>
        <div class="admin-empty">Aucune notification pour le moment.</div>
      </div>
    </div>

  </main>
</div>
</body>
</html>