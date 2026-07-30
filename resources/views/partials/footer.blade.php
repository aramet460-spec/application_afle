<footer id="contact">
  <div class="wrap">
    <div class="footer-grid">
      <div class="footer-brand">
        <div class="logo" style="flex-direction:row; align-items:baseline; gap:0;">AFLE <span>&nbsp;Digital</span></div>
        <p>Association des Femmes Leaders Entrepreneures — au service de l'autonomisation économique des femmes.</p>
      </div>
      <div>
        <h4>Navigation</h4>
        <ul>
          <li><a href="{{ url('/') }}#apropos">À propos</a></li>
          <li><a href="{{ url('/') }}#entrepreneures">Entrepreneures</a></li>
          <li><a href="{{ url('/') }}#actualites">Actualités</a></li>
          <li><a href="{{ url('/') }}#evenements">Événements</a></li>
        </ul>
      </div>
      <div>
        <h4>Ressources</h4>
        <ul>
          <li><a href="#">Formations</a></li>
          <li><a href="{{ route('register') }}">Devenir membre</a></li>
          <li><a href="#">Partenaires</a></li>
        </ul>
      </div>
      <div>
        <h4>Contact</h4>
        <ul>
          <li>Dakar, Sénégal</li>
          <li>contact@afle.org</li>
          <li>+221 00 000 00 00</li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <span>© 2026 AFLE Digital. Tous droits réservés.</span>
      <div class="socials">
        <a href="#" aria-label="Facebook">f</a>
        <a href="#" aria-label="Instagram">ig</a>
        <a href="#" aria-label="LinkedIn">in</a>
      </div>
    </div>
  </div>
</footer>

<script>
  const burgerBtn = document.getElementById('burgerBtn');
  const mobilePanel = document.getElementById('mobilePanel');

  function closeMenu(){
    mobilePanel.classList.remove('open');
    burgerBtn.setAttribute('aria-expanded', 'false');
  }

  burgerBtn.addEventListener('click', () => {
    const isOpen = mobilePanel.classList.toggle('open');
    burgerBtn.setAttribute('aria-expanded', String(isOpen));
  });

  // Ferme le menu quand on clique sur un lien
  mobilePanel.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', closeMenu);
  });

  // Ferme le menu si on repasse en affichage desktop
  window.addEventListener('resize', () => {
    if (window.innerWidth > 900) closeMenu();
  });
</script>