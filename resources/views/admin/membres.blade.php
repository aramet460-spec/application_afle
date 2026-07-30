<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Membres — AFLE Digital</title>
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
        <h1>Membres inscrits</h1>
        <p>{{ $membres->count() }} membre(s) au total.</p>
      </div>
    </div>

    @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="admin-panel">
      @if ($membres->isEmpty())
        <div class="admin-empty">Aucune inscription pour le moment.</div>
      @else
        <table class="admin-table">
          <thead>
            <tr>
              <th>Nom</th>
              <th>Contact</th>
              <th>Pays / Ville</th>
              <th>Secteur</th>
              <th>Statut</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($membres as $membre)
              <tr>
                <td>{{ $membre->nomComplet() }}</td>
                <td>
                  {{ $membre->email }}<br>
                  <span style="color:var(--muted); font-size:0.82rem;">{{ $membre->telephone }}</span>
                </td>
                <td>{{ $membre->ville }}, {{ $membre->pays }}</td>
                <td>{{ $membre->secteur_activite ?? '—' }}</td>
                <td>
                  <span class="admin-status {{ $membre->statut }}">
                    @switch($membre->statut)
                      @case('en_attente') En attente @break
                      @case('valide') Validé @break
                      @case('refuse') Refusé @break
                    @endswitch
                  </span>
                </td>
                <td>
                  @if ($membre->statut === 'en_attente')
                    <div style="display:flex; gap:8px;">
                      <form method="POST" action="{{ route('admin.membres.valider', $membre) }}"
                            onsubmit="return confirm('Valider {{ $membre->nomComplet() }} ?');">
                        @csrf
                        <button type="submit" class="admin-action-btn valider">Valider</button>
                      </form>
                      <form method="POST" action="{{ route('admin.membres.refuser', $membre) }}"
                            onsubmit="return confirm('Refuser {{ $membre->nomComplet() }} ?');">
                        @csrf
                        <button type="submit" class="admin-action-btn refuser">Refuser</button>
                      </form>
                    </div>
                  @else
                    <span style="color:var(--muted); font-size:0.82rem;">—</span>
                  @endif
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