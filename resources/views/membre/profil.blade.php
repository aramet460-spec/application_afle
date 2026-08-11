<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Mon profil — AFLE Digital</title>
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
        <h1>Mon profil</h1>
        <p>Modifie tes informations personnelles.</p>
      </div>
    </div>

    @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

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
      <form method="POST" action="{{ route('membre.profil.update') }}" enctype="multipart/form-data">
        @csrf

        <div class="field field-full" style="margin-bottom:24px;">
          <label>Photo de profil</label>
          <div class="file-field">
            <div class="file-preview" id="filePreview">
              @if ($user->photo_profil)
                <img src="{{ asset('storage/'.$user->photo_profil) }}" alt="" style="width:100%; height:100%; object-fit:cover; border-radius:50%;">
              @else
                Photo
              @endif
            </div>
            <input type="file" id="photo_profil" name="photo_profil" accept="image/*">
          </div>
        </div>

        <div class="form-grid">
          <div class="field">
            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" name="prenom" value="{{ old('prenom', $user->prenom) }}">
          </div>
          <div class="field">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" value="{{ old('nom', $user->nom) }}">
          </div>

          <div class="field">
            <label for="profession">Profession</label>
            <input type="text" id="profession" name="profession" value="{{ old('profession', $user->profession) }}">
          </div>
          <div class="field">
            <label for="entreprise">Entreprise</label>
            <input type="text" id="entreprise" name="entreprise" value="{{ old('entreprise', $user->entreprise) }}">
          </div>

          <div class="field field-full">
            <label for="secteur_activite">Secteur d'activité</label>
            <input type="text" id="secteur_activite" name="secteur_activite" value="{{ old('secteur_activite', $user->secteur_activite) }}">
          </div>

          <div class="field field-full">
            <button type="submit" class="btn btn-primary auth-submit">Enregistrer les modifications</button>
          </div>
        </div>
      </form>
    </div>

  </main>
</div>

<script>
  const photoInput = document.getElementById('photo_profil');
  const filePreview = document.getElementById('filePreview');
  if (photoInput) {
    photoInput.addEventListener('change', () => {
      const file = photoInput.files[0];
      if (!file) return;
      const reader = new FileReader();
      reader.onload = (e) => {
        filePreview.innerHTML = `<img src="${e.target.result}" style="width:100%;height:100%;object-fit:cover;border-radius:50%;">`;
      };
      reader.readAsDataURL(file);
    });
  }
</script>
</body>
</html>