<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Connexion — AFLE Digital</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,600;9..144,700&family=Work+Sans:wght@400;500;600;700&family=JetBrains+Mono:wght@500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

@include('partials.header')

<!-- BANNIERE -->
<section class="auth-hero">
  <div class="wrap">
    <span class="eyebrow">Espace membre</span>
    <h1>Connexion à ton compte AFLE</h1>
    <p>Connecte-toi avec ton email ou ton numéro de téléphone.</p>
  </div>
</section>

<!-- FORMULAIRE -->
<section class="auth-section">
  <div class="wrap">
    <div class="auth-card" style="max-width:480px;">

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

      <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-grid" style="grid-template-columns:1fr;">
          <div class="field">
            <label for="identifiant">Email ou téléphone</label>
            <input type="text" id="identifiant" name="identifiant" value="{{ old('identifiant') }}" placeholder="nom@email.com ou 77 000 00 00">
          </div>

          <div class="field">
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" placeholder="Ton mot de passe">
          </div>

          <div class="field">
            <button type="submit" class="btn btn-primary auth-submit">Se connecter</button>
          </div>
        </div>
      </form>

      <div class="auth-switch">
        Pas encore membre ? <a href="{{ route('register') }}">S'inscrire</a>
      </div>

    </div>
  </div>
</section>

@include('partials.footer')
</body>
</html>