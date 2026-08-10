<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Demande de financement — AFLE Digital</title>
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
        <h1>Demande de financement</h1>
        <p>Suis ici l'état de tes demandes.</p>
      </div>
      <a href="{{ route('membre.financement.create') }}" class="btn btn-primary">+ Nouvelle demande</a>
    </div>

    @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="admin-panel">
      @if ($demandes->isEmpty())
        <div class="admin-empty">Tu n'as encore fait aucune demande de financement.</div>
      @else
        <table class="admin-table">
          <thead>
            <tr>
              <th>Montant</th>
              <th>Envoyée le</th>
              <th>Statut</th>
              <th>Réponse de l'admin</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($demandes as $demande)
              <tr>
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
                <td>{{ $demande->reponse_admin ?? '—' }}</td>
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