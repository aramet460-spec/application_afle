<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tableau de bord — AFLE Digital</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,600;9..144,700&family=Work+Sans:wght@400;500;600;700&family=JetBrains+Mono:wght@500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<div class="admin-layout">

  @include('admin.partials.sidebar')

  <main class="admin-main">

    <div class="admin-topbar">
      <div>
        <span class="eyebrow">Espace administrateur</span>
        <h1>Tableau de bord</h1>
        <p>Vue d'ensemble de l'activité de l'AFLE.</p>
      </div>
    </div>

    <!-- CARTES STATISTIQUES -->
    <div class="admin-stats-grid">
      <div class="admin-card">
        <div class="num">{{ $nombreMembres }}</div>
        <div class="label">Membres</div>
      </div>
      <div class="admin-card">
        <div class="num">{{ count($evenementsAVenir) }}</div>
        <div class="label">Événements à venir</div>
      </div>
      <div class="admin-card">
        <div class="num">{{ count($actualites) }}</div>
        <div class="label">Actualités publiées</div>
      </div>
      <div class="admin-card">
        <div class="num">{{ count($opportunites) }}</div>
        <div class="label">Opportunités disponibles</div>
      </div>
    </div>

    <!-- ALERTE VALIDATION -->
    @if ($membresEnAttente > 0)
      <div class="admin-card highlight" style="margin-bottom:32px;">
        <div>
          <div class="num">{{ $membresEnAttente }}</div>
          <div class="label">
            {{ $membresEnAttente > 1 ? 'inscriptions en attente de validation' : 'inscription en attente de validation' }}
          </div>
        </div>
        <a href="{{ route('admin.membres') }}">Voir les demandes →</a>
      </div>
    @endif

    <!-- ACTUALITES + NOTIFICATIONS -->
    <div class="admin-panels">
      <div class="admin-panel">
        <h2>Dernières actualités</h2>
        @forelse ($actualites as $actu)
          <div class="admin-list">
            <div class="admin-list-item">
              <div>
                <div class="title">{{ $actu['titre'] }}</div>
                <div class="meta">{{ $actu['date'] }}</div>
              </div>
            </div>
          </div>
        @empty
          <div class="admin-empty">Aucune actualité publiée pour le moment.</div>
        @endforelse
      </div>

      <div class="admin-panel">
        <h2>Notifications</h2>
        @forelse ($notifications as $notif)
          <div class="admin-list">
            <div class="admin-list-item">
              <div>
                <div class="title">{{ $notif['message'] }}</div>
                <div class="meta">{{ $notif['date'] }}</div>
              </div>
            </div>
          </div>
        @empty
          <div class="admin-empty">Aucune notification pour le moment.</div>
        @endforelse
      </div>
    </div>

  </main>
</div>
</body>
</html>