<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Actualités — AFLE Digital</title>
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
        <h1>Actualités</h1>
        <p>Les dernières nouvelles et publications de l'AFLE.</p>
      </div>
    </div>

    <div class="news-grid" style="grid-template-columns:repeat(2, 1fr);">
      @forelse ($actualites as $actu)
        <article class="card">
          @if ($actu->image)
            <div class="thumb"><img src="{{ asset('storage/'.$actu->image) }}" alt="{{ $actu->titre }}"></div>
          @endif
          <div class="card-body">
            <span class="eyebrow">{{ $actu->created_at->format('d M Y') }}</span>
            <h3>{{ $actu->titre }}</h3>
            <p>{{ \Illuminate\Support\Str::limit($actu->contenu, 140) }}</p>
          </div>
        </article>
      @empty
        <div class="admin-empty" style="grid-column:1/-1;">Aucune actualité publiée pour le moment.</div>
      @endforelse
    </div>

  </main>
</div>
</body>
</html>