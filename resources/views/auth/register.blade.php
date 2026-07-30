<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Devenir membre — AFLE Digital</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,600;9..144,700&family=Work+Sans:wght@400;500;600;700&family=JetBrains+Mono:wght@500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

@include('partials.header')

<!-- BANNIERE -->
<section class="auth-hero">
  <div class="wrap">
    <span class="eyebrow">Rejoindre la communauté</span>
    <h1>Devenir membre AFLE</h1>
    <p>Remplis le formulaire ci-dessous. Ton compte sera activé après validation par un administrateur.</p>
  </div>
</section>

<!-- FORMULAIRE -->
<section class="auth-section">
  <div class="wrap">
    <div class="auth-card">

      @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      @if ($errors->any())
        <div class="alert alert-error">
          Merci de corriger les erreurs suivantes :
          <ul>
            @foreach ($errors->all() as $error)
              <li>— {{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-grid">
          <div class="field">
            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" name="prenom" value="{{ old('prenom') }}" placeholder="Prenom">
          </div>

          <div class="field">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" value="{{ old('nom') }}" placeholder="Nom">
          </div>

          <div class="field">
            <label for="telephone">Téléphone</label>
            <input type="tel" id="telephone" name="telephone" value="{{ old('telephone') }}" placeholder="77 000 00 00">
          </div>

          <div class="field">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="nom@email.com">
          </div>

          <div class="field">
            <label for="pays">Pays</label>
            <input type="text" id="pays" name="pays" value="{{ old('pays') }}" placeholder="Sénégal">
          </div>

          <div class="field">
            <label for="ville">Ville</label>
            <input type="text" id="ville" name="ville" value="{{ old('ville') }}" placeholder="Dakar">
          </div>

          <div class="field">
            <label for="profession">Profession</label>
            <input type="text" id="profession" name="profession" value="{{ old('profession') }}" placeholder="Entrepreneure">
          </div>

          <div class="field">
            <label for="entreprise">Entreprise</label>
            <input type="text" id="entreprise" name="entreprise" value="{{ old('entreprise') }}" placeholder="Nom de l'entreprise">
          </div>

          <div class="field field-full">
            <label for="secteur_activite">Secteur d'activité</label>
            <input type="text" id="secteur_activite" name="secteur_activite" value="{{ old('secteur_activite') }}" placeholder="Commerce, artisanat, tech...">
          </div>

          <div class="field field-full">
            <label for="photo_profil">Photo de profil</label>
            <div class="file-field">
              <div class="file-preview" id="filePreview">Photo</div>
              <input type="file" id="photo_profil" name="photo_profil" accept="image/*">
            </div>
          </div>

          <div class="field">
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" placeholder="8 caractères minimum">
          </div>

          <div class="field">
            <label for="password_confirmation">Confirmer le mot de passe</label>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Retape ton mot de passe">
          </div>

          <div class="field field-full">
            <button type="submit" class="btn btn-primary auth-submit">S'inscrire</button>
          </div>
        </div>
      </form>

      <div class="auth-switch">
        Déjà membre ? <a href="{{ route('login') }}">Se connecter</a>
      </div>

    </div>
  </div>
</section>

@include('partials.footer')

<script>
  // Petit aperçu du nom de fichier choisi pour la photo de profil
  const photoInput = document.getElementById('photo_profil');
  const filePreview = document.getElementById('filePreview');
  if (photoInput) {
    photoInput.addEventListener('change', () => {
      const file = photoInput.files[0];
      if (!file) return;
      const reader = new FileReader();
      reader.onload = (e) => {
        filePreview.style.backgroundImage = `url(${e.target.result})`;
        filePreview.style.backgroundSize = 'cover';
        filePreview.style.backgroundPosition = 'center';
        filePreview.textContent = '';
      };
      reader.readAsDataURL(file);
    });
  }
</script>
</body>
</html>