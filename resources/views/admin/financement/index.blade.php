<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Demandes de financement — AFLE Digital</title>
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
        <h1>Demandes de financement</h1>
        <p>{{ $demandes->count() }} demande(s) au total.</p>
      </div>
    </div>

    @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="admin-panel">
      @if ($demandes->isEmpty())
        <div class="admin-empty">Aucune demande de financement pour le moment.</div>
      @else
        <table class="admin-table">
          <thead>
            <tr>
              <th>Membre</th>
              <th>Contact</th>
              <th>Montant</th>
              <th>Envoyée le</th>
              <th>Statut</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($demandes as $demande)
              <tr>
                <td>{{ $demande->membre->nomComplet() }}</td>
                <td>
                  {{ $demande->membre->email }}<br>
                  <span style="color:var(--muted); font-size:0.82rem;">{{ $demande->membre->telephone }}</span>
                </td>
                <td>{{ number_format($demande->montant, 0, ',', ' ') }} FCFA</td>
                <td>{{ $demande->created_at->format('d/m/Y') }}</td>
                <td>
                  <span class="admin-status {{ $demande->statut }}">
                    @switch($demande->statut)
                      @case('en_attente') En attente @break
                      @case('approuve') Approuvée @break
                      @case('refuse') Refusée @break
                    @endswitch
                  </span>
                </td>
                <td>
                  <a href="{{ route('admin.financement.show', $demande) }}" class="admin-action-btn valider" style="text-decoration:none;">Voir le dossier</a>
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