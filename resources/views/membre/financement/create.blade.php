<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Nouvelle demande de financement — AFLE Digital</title>
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
        <h1>Nouvelle demande de financement</h1>
        <p>Tes coordonnées ({{ auth()->user()->nomComplet() }}, {{ auth()->user()->telephone }}) sont automatiquement jointes à la demande.</p>
      </div>
    </div>

    @if ($errors->any())
      <div class="alert alert-error">
        <ul>
          @foreach ($errors->all() as $error)
            <li>— {{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <div class="admin-panel">
      <form method="POST" action="{{ route('membre.financement.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-grid">
          <div class="field field-full">
            <label for="montant">Montant souhaité (FCFA)</label>
            <input type="number" id="montant" name="montant" value="{{ old('montant') }}" placeholder="500000">
          </div>

          <div class="field field-full">
            <label for="piece_identite">Pièce d'identité</label>
            <div class="file-field">
              <div class="file-preview">📄</div>
              <input type="file" id="piece_identite" name="piece_identite" accept="image/*,.pdf">
            </div>
          </div>

          <div class="field field-full">
            <label for="certificat_domicile">Certificat de domicile</label>
            <div class="file-field">
              <div class="file-preview">📄</div>
              <input type="file" id="certificat_domicile" name="certificat_domicile" accept="image/*,.pdf">
            </div>
          </div>

          <div class="field field-full">
            <label for="casier_judiciaire">Casier judiciaire</label>
            <div class="file-field">
              <div class="file-preview">📄</div>
              <input type="file" id="casier_judiciaire" name="casier_judiciaire" accept="image/*,.pdf">
            </div>
          </div>

          <div class="field field-full" style="display:flex; gap:12px;">
            <button type="submit" class="btn btn-primary">Envoyer la demande</button>
            <a href="{{ route('membre.financement.index') }}" class="btn btn-ghost" style="color:var(--muted); border-color:var(--line);">Annuler</a>
          </div>
        </div>
      </form>
    </div>

  </main>
</div>
</body>
</html>