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

  @include('admin.partials.sidebar')

  <main class="admin-main">

    <div class="admin-topbar">
      <div>
        <span class="eyebrow">Espace administrateur</span>
        <h1>Actualités</h1>
        <p>{{ $actualites->count() }} publication(s) (actualités et événements).</p>
      </div>
      <a href="{{ route('admin.actualites.create') }}" class="btn btn-primary">+ Publier une actualité</a>
    </div>

    @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="admin-panel">
      @if ($actualites->isEmpty())
        <div class="admin-empty">Aucune publication pour le moment.</div>
      @else
        <table class="admin-table">
          <thead>
            <tr>
              <th>Image</th>
              <th>Titre</th>
              <th>Type</th>
              <th>Publiée le</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($actualites as $actu)
              <tr>
                <td>
                  @if ($actu->image)
                    <img src="{{ asset('storage/'.$actu->image) }}" alt="" style="width:56px; height:40px; object-fit:cover; border-radius:3px;">
                  @else
                    <span style="color:var(--muted); font-size:0.8rem;">—</span>
                  @endif
                </td>
                <td>{{ $actu->titre }}</td>
                <td>
                  @if ($actu->type === 'evenement')
                    <span class="admin-status en_attente">Événement</span>
                  @else
                    <span class="admin-status valide">Actualité</span>
                  @endif
                </td>
                <td>{{ $actu->created_at->format('d/m/Y') }}</td>
                <td>
                  <form method="POST" action="{{ route('admin.actualites.destroy', $actu) }}"
                        onsubmit="return confirm('Supprimer cette publication ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="admin-action-btn refuser">Supprimer</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      @endif
    </div>

  </main>
</div>
</body>
</html>