<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Publier une actualité — AFLE Digital</title>
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
        <h1>Publier une actualité</h1>
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
      <form method="POST" action="{{ route('admin.actualites.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-grid">
          <div class="field field-full">
            <label for="titre">Titre</label>
            <input type="text" id="titre" name="titre" value="{{ old('titre') }}">
          </div>

          <div class="field field-full">
  <label for="type">Type de publication</label>
  <select id="type" name="type" style="border:1px solid var(--line); border-radius:3px; padding:12px 14px; font-family:'Work Sans', sans-serif; font-size:0.95rem;">
    <option value="actualite" {{ old('type') === 'actualite' ? 'selected' : '' }}>Actualité</option>
    <option value="evenement" {{ old('type') === 'evenement' ? 'selected' : '' }}>Événement</option>
  </select>
</div>

          <div class="field field-full">
            <label for="contenu">Contenu</label>
            <textarea id="contenu" name="contenu" rows="6"
              style="border:1px solid var(--line); border-radius:3px; padding:12px 14px; font-family:'Work Sans', sans-serif; font-size:0.95rem;">{{ old('contenu') }}</textarea>
          </div>

          <div class="field field-full">
            <label>Image (optionnelle)</label>
            <div class="file-field">
              <div class="file-preview" id="filePreview">Image</div>
              <input type="file" id="image" name="image" accept="image/*">
            </div>
          </div>

          <div class="field field-full" style="display:flex; gap:12px;">
            <button type="submit" class="btn btn-primary">Publier</button>
            <a href="{{ route('admin.actualites.index') }}" class="btn btn-ghost" style="color:var(--muted); border-color:var(--line);">Annuler</a>
          </div>
        </div>
      </form>
    </div>

  </main>
</div>

<script>
  const imgInput = document.getElementById('image');
  const preview = document.getElementById('filePreview');
  if (imgInput) {
    imgInput.addEventListener('change', () => {
      const file = imgInput.files[0];
      if (!file) return;
      const reader = new FileReader();
      reader.onload = (e) => {
        preview.innerHTML = `<img src="${e.target.result}" style="width:100%;height:100%;object-fit:cover;border-radius:50%;">`;
      };
      reader.readAsDataURL(file);
    });
  }
</script>
</body>
</html>