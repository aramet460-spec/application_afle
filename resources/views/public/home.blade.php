<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AFLE Digital — Accueil</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,600;9..144,700&family=Work+Sans:wght@400;500;600;700&family=JetBrains+Mono:wght@500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

@include('partials.header')

<!-- HERO / ACCUEIL -->
<section class="hero" id="accueil">
  <div class="wrap hero-grid">
    <div>
      <span class="eyebrow">Association des Femmes Leaders Entrepreneures</span>
      <h1>Bâtir ensemble une <em>génération</em> de femmes qui entreprennent, dirigent et inspirent.</h1>
      <p>AFLE accompagne les femmes entrepreneures à chaque étape de leur parcours : formation, réseau, financement et visibilité.</p>
      <div class="btn-row">
        <a href="{{ route('register') }}" class="btn btn-primary">Devenir membre</a>
        <a href="#apropos" class="btn btn-ghost">Découvrir l'AFLE</a>
      </div>
    </div>
    <div class="welcome-card">
      <div class="photo"><img src="https://picsum.photos/seed/afle-presidente/200/200" alt="Photo de la présidente de l'AFLE"></div>
      <p>« Chaque femme qui entreprend porte avec elle l'avenir de toute une communauté. L'AFLE existe pour qu'aucune d'entre elles n'avance seule. »</p>
      <div class="name">Nom de la Présidente</div>
      <div class="role">Présidente, AFLE</div>
    </div>
  </div>
</section>

<!-- CHIFFRES CLES -->
<section class="stats">
  <div class="wrap stats-grid">
    <div class="stat"><div class="num">500+</div><div class="label">Membres actives</div></div>
    <div class="stat"><div class="num">18</div><div class="label">Pays représentés</div></div>
    <div class="stat"><div class="num">120</div><div class="label">Formations dispensées</div></div>
    <div class="stat"><div class="num">40+</div><div class="label">Partenaires engagés</div></div>
  </div>
</section>

<!-- A PROPOS TEASER -->
<section class="block about" id="apropos">
  <div class="wrap about-grid">
    <div class="about-imgwrap">
      <img src="{{ asset('images/apropos.png') }}" alt="Rencontre de membres AFLE">
    </div>
    <div>
      <span class="eyebrow">À propos de l'AFLE</span>
      <h2 style="margin:12px 0 18px; font-size:2rem;">Une communauté au service de l'autonomisation économique des femmes</h2>
      <p>AFLE – Alliance des Femmes Leaders et Entrepreneurs est une organisation internationale qui œuvre pour le développement du leadership féminin, l’entrepreneuriat et l’autonomisation économique des femmes.

À travers un réseau dynamique de dirigeantes, entrepreneures, professionnelles et porteuses de projets, AFLE crée des opportunités de collaboration, de formation, de financement et de visibilité afin d’accélérer la réussite de ses membres.

Notre ambition est de bâtir une communauté influente où les compétences, l’innovation et la solidarité deviennent des leviers de croissance durable. Grâce à cette plateforme, chaque membre accède à un écosystème complet favorisant le réseautage, les opportunités d’affaires, le partage d’expériences et le développement personnel et professionnel.

Ensemble, nous révélons le potentiel des femmes, créons des opportunités et construisons un avenir plus inclusif, innovant et prospère.
      <div class="btn-row" style="margin-top:26px;">
        <a href="#" class="btn btn-primary">Notre bureau exécutif</a>
      </div>
    </div>
  </div>
</section>

<!-- ACTUALITES -->
<section class="block news" id="actualites">
  <div class="wrap">
    <div class="block-head">
      <div>
        <span class="eyebrow">Actualités</span>
        <h2>Ce qui se passe à l'AFLE</h2>
      </div>
      <a href="#" class="see-all">Toutes les actualités →</a>
    </div>
    <div class="news-grid">
      <article class="card">
        <div class="thumb"><img src="{{ asset('images/formation-ballon.jpeg') }}" alt="Article actualité 1"></div>
        <div class="card-body">
          <span class="eyebrow">Témoignage</span>
          <h3>Des formations gratuites en decoration organises pour les membres de l'AFLE</h3>
          <p>Découvrez comment l'accompagnement AFLE a transformé une petite activité en entreprise structurée.</p>
        </div>
      </article>
      <article class="card">
        <div class="thumb"><img src="{{ asset('images/queen-buffet.jpeg') }}" alt="Article actualité 2"></div>
        <div class="card-body">
          <span class="eyebrow">Interview</span>
          <h3>Rencontre avec le nouveau bureau exécutif de l'AFLE</h3>
          <p>Les priorités et ambitions de l'équipe dirigeante pour l'année à venir.</p>
        </div>
      </article>
      <article class="card">
        <div class="thumb"><img src="https://picsum.photos/seed/afle-news3/500/320" alt="Article actualité 3"></div>
        <div class="card-body">
          <span class="eyebrow">Partenariat</span>
          <h3>AFLE signe un nouveau partenariat de financement</h3>
          <p>Un accord qui ouvrira l'accès au microcrédit pour davantage de membres.</p>
        </div>
      </article>
    </div>
  </div>
</section>

<!-- EVENEMENTS -->
<section class="block events" id="evenements">
  <div class="wrap">
    <div class="block-head">
      <div>
        <span class="eyebrow">Événements</span>
        <h2>Prochains rendez-vous</h2>
      </div>
      <a href="#" class="see-all">Voir le calendrier →</a>
    </div>
    <div class="events-list">
      <div class="event-row">
        <div class="event-date"><span class="day">05</span><span class="month">Août</span></div>
        <div class="event-info"><h3>Conférence : femmes & financement</h3><span>Dakar · Table ronde avec des investisseurs</span></div>
        <div class="event-tag">Conférence</div>
      </div>
      <div class="event-row">
        <div class="event-date"><span class="day">15</span><span class="month">Août</span></div>
        <div class="event-info"><h3>Formation en Fleur et Deco</h3><span>Ouvert à toutes les membres</span></div>
        <div class="event-tag">Formation</div>
      </div>
      <div class="event-row">
        <div class="event-date"><span class="day"></span><span class="month">Août</span></div>
        <div class="event-info"><h3>Queen Buffet — Édition annuelle</h3><span>Dakar · Soirée de gala et remise de distinctions</span></div>
        <div class="event-tag">Gala</div>
      </div>
    </div>
  </div>
</section>

<!-- ANNUAIRE TEASER -->
<section class="block directory" id="entrepreneures">
  <div class="wrap">
    <span class="eyebrow">Nos entrepreneures</span>
    <h2 style="margin-top:12px;">Un annuaire de femmes qui entreprennent partout dans la région</h2>
    <p>Parcourez les profils de nos membres, découvrez leurs entreprises et trouvez-les par pays ou secteur d'activité.</p>
    <div class="avatars">
      <img src="https://picsum.photos/seed/afle-m1/100/100" alt="">
      <img src="https://picsum.photos/seed/afle-m2/100/100" alt="">
      <img src="https://picsum.photos/seed/afle-m3/100/100" alt="">
      <img src="https://picsum.photos/seed/afle-m4/100/100" alt="">
      <img src="https://picsum.photos/seed/afle-m5/100/100" alt="">
    </div>
    <a href="#" class="btn btn-primary">Explorer l'annuaire</a>
  </div>
</section>

<!-- CTA DEVENIR MEMBRE -->
<section class="cta-join">
  <div class="wrap">
    <h2>Prête à rejoindre l'AFLE ?</h2>
    <p>Bénéficiez d'un réseau, de formations et d'un accompagnement pensés pour faire grandir votre entreprise.</p>
    <a href="{{ route('register') }}" class="btn btn-primary">Rejoindre l'AFLE</a>
  </div>
</section>

@include('partials.footer')
</body>
</html>