<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dossier de financement — AFLE Digital</title>
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
        <h1>Dossier de {{ $demande->membre->nomComplet() }}</h1>
        <p>Demande envoyée le {{ $demande->created_at->format('d/m/Y à H:i') }}</p>
      </div>
      <span class="admin-status {{ $demande->statut }}">
        @switch($demande->statut)
          @case('en_attente') En attente @break
          @case('approuve') Approuvée @break
          @case('refuse') Refusée @break
        @endswitch
      </span>
    </div>

    <!-- INFOS DU MEMBRE -->
    <div class="admin-panel" style="margin-bottom:22px;">
      <h2>Informations du membre</h2>
      <div class="profil-view">
        <dl>
          <dt>Nom complet</dt><dd>{{ $demande->membre->nomComplet() }}</dd>
          <dt>Email</dt><dd>{{ $demande->membre->email }}</dd>
          <dt>Téléphone</dt><dd>{{ $demande->membre->telephone }}</dd>
          <dt>Pays / Ville</dt><dd>{{ $demande->membre->ville }}, {{ $demande->membre->pays }}</dd>
          <dt>Montant demandé</dt><dd style="font-weight:700; color:var(--ink);">{{ number_format($demande->montant, 0, ',', ' ') }} FCFA</dd>
        </dl>
      </div>
    </div>

    <!-- DOCUMENTS -->
    <div class="admin-panel" style="margin-bottom:22px;">
      <h2>Documents fournis</h2>
      <div class="annuaire-grid" style="grid-template-columns:repeat(3, 1fr);">
        <a href="{{ asset('storage/'.$demande->piece_identite) }}" target="_blank" class="annuaire-card" style="text-decoration:none;">
          <div class="avatar">📄</div>
          <div class="name">Pièce d'identité</div>
          <div class="role">Cliquer pour ouvrir</div>
        </a>
        <a href="{{ asset('storage/'.$demande->certificat_domicile) }}" target="_blank" class="annuaire-card" style="text-decoration:none;">
          <div class="avatar">📄</div>
          <div class="name">Certificat de domicile</div>
          <div class="role">Cliquer pour ouvrir</div>
        </a>
        <a href="{{ asset('storage/'.$demande->casier_judiciaire) }}" target="_blank" class="annuaire-card" style="text-decoration:none;">
          <div class="avatar">📄</div>
          <div class="name">Casier judiciaire</div>
          <div class="role">Cliquer pour ouvrir</div>
        </a>
      </div>
    </div>

    <!-- REPONSE -->
    <div class="admin-panel">
      <h2>{{ $demande->statut === 'en_attente' ? 'Répondre à la demande' : 'Réponse envoyée' }}</h2>

      @if ($demande->statut === 'en_attente')
        <form method="POST" action="{{ route('admin.financement.repondre', $demande) }}">
          @csrf

          <div class="form-grid">
            <div class="field field-full">
              <label for="statut">Décision</label>
              <select id="statut" name="statut" style="border:1px solid var(--line); border-radius:3px; padding:12px 14px; font-family:'Work Sans', sans-serif; font-size:0.95rem;">
                <option value="approuve">Approuver la demande</option>
                <option value="refuse">Refuser la demande</option>
              </select>
            </div>

            <div class="field field-full">
              <label for="reponse_admin">Message pour le membre (optionnel)</label>
              <textarea id="reponse_admin" name="reponse_admin" rows="4"
                style="border:1px solid var(--line); border-radius:3px; padding:12px 14px; font-family:'Work Sans', sans-serif; font-size:0.95rem;"
                placeholder="Ex : Dossier validé, virement sous 5 jours."></textarea>
            </div>

            <div class="field field-full">
              <button type="submit" class="btn btn-primary">Envoyer la réponse</button>
            </div>
          </div>
        </form>
      @else
        <p style="color:var(--muted); font-size:0.92rem;">
          {{ $demande->reponse_admin ?: 'Aucun message laissé.' }}
        </p>
      @endif
    </div>

  </main>
</div>
</body>
</html>