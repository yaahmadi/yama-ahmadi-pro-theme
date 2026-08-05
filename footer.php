</main>
<footer class="ya-footer">
  <div class="ya-shell">
    <section class="ya-app-strip reveal">
      <div class="ya-app-copy">
        <span class="ya-kicker">PWA • MOBILE READY</span>
        <h2><?php echo esc_html(ya_t('app')); ?></h2>
        <p><?php echo esc_html(ya_t('app_text')); ?></p>
      </div>
      <div class="ya-store-row">
        <button data-ya-install class="ya-store" type="button"><i class="fa-brands fa-google-play"></i><span><small>Install on</small><strong>Android</strong></span></button>
        <button data-ya-install class="ya-store" type="button"><i class="fa-brands fa-apple"></i><span><small>Add to</small><strong>iPhone / iPad</strong></span></button>
      </div>
    </section>

    <div class="ya-footer-main">
      <div class="ya-footer-brand-col">
        <a class="ya-brand ya-footer-brand" href="<?php echo esc_url(home_url('/')); ?>">
          <span class="ya-brand-mark"><span></span><span></span><span></span></span>
          <span class="ya-brand-copy"><strong>YAMA AHMADI</strong><small>IT SUPPORT &amp; SERVICES</small></span>
        </a>
        <p>Support informatique, réseaux, cybersécurité, Microsoft 365, cloud, maintenance et assistance professionnelle pour les entreprises en France.</p>
        <div class="ya-social">
          <?php if (get_theme_mod('ya_linkedin')): ?><a href="<?php echo esc_url(get_theme_mod('ya_linkedin')); ?>" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a><?php endif; ?>
          <?php if (get_theme_mod('ya_facebook')): ?><a href="<?php echo esc_url(get_theme_mod('ya_facebook')); ?>" target="_blank" rel="noopener" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a><?php endif; ?>
        </div>
      </div>
      <div><h3><?php echo esc_html(ya_t('services')); ?></h3><a href="<?php echo esc_url(ya_page('services')); ?>#support">Support informatique</a><a href="<?php echo esc_url(ya_page('services')); ?>#network">Réseaux & Wi‑Fi</a><a href="<?php echo esc_url(ya_page('services')); ?>#security">Cybersécurité</a><a href="<?php echo esc_url(ya_page('services')); ?>#cloud">Microsoft 365 & Cloud</a></div>
      <div><h3>Entreprise</h3><a href="<?php echo esc_url(ya_page('a-propos')); ?>"><?php echo esc_html(ya_t('about')); ?></a><a href="<?php echo esc_url(ya_page('solutions')); ?>"><?php echo esc_html(ya_t('solutions')); ?></a><a href="<?php echo esc_url(ya_page('projets')); ?>"><?php echo esc_html(ya_t('projects')); ?></a><a href="<?php echo esc_url(ya_page('contact')); ?>"><?php echo esc_html(ya_t('contact')); ?></a></div>
      <div><h3><?php echo esc_html(ya_t('contact')); ?></h3><a href="tel:<?php echo esc_attr(preg_replace('/\s+/', '', get_theme_mod('ya_phone','+33 7 84 20 31 50'))); ?>"><?php echo esc_html(get_theme_mod('ya_phone','+33 7 84 20 31 50')); ?></a><a href="mailto:<?php echo esc_attr(get_theme_mod('ya_email','support@yamaahmadi.fr')); ?>"><?php echo esc_html(get_theme_mod('ya_email','support@yamaahmadi.fr')); ?></a><span><?php echo esc_html(get_theme_mod('ya_hours','Lun – Ven : 08:00 – 18:00')); ?></span><span><?php echo esc_html(get_theme_mod('ya_location','France')); ?></span></div>
      <div><h3>Legal</h3><a href="<?php echo esc_url(ya_page('mentions-legales')); ?>"><?php echo esc_html(ya_t('legal')); ?></a><a href="<?php echo esc_url(ya_page('politique-de-confidentialite')); ?>"><?php echo esc_html(ya_t('privacy')); ?></a><a href="<?php echo esc_url(ya_page('politique-de-cookies')); ?>"><?php echo esc_html(ya_t('cookies')); ?></a><a href="<?php echo esc_url(ya_page('conditions-utilisation')); ?>"><?php echo esc_html(ya_t('terms')); ?></a></div>
    </div>
    <div class="ya-footer-bottom"><span>© <?php echo esc_html(date('Y')); ?> Yama Ahmadi Services Informatiques.</span><span>France • IT Support • Networks • Cybersecurity • Cloud</span></div>
  </div>
</footer>
<div class="ya-install-toast" data-ya-install-toast hidden><div><strong><?php echo esc_html(ya_t('app')); ?></strong><small>PWA ready</small></div><button data-ya-install type="button">Install</button><button data-ya-install-close type="button" aria-label="Close">×</button></div>
<div class="ya-location-modal" data-ya-location-modal aria-hidden="true"><div class="ya-location-backdrop" data-ya-location-close></div><div class="ya-location-card"><button class="ya-location-close" data-ya-location-close type="button">×</button><div class="ya-location-icon"><i class="fa-solid fa-location-dot"></i></div><span class="ya-kicker"><?php echo esc_html(ya_t('location')); ?></span><h3><?php echo esc_html(ya_t('coverage')); ?></h3><p>Votre localisation précise n’est utilisée que si vous l’autorisez dans votre navigateur.</p><button class="ya-btn" data-ya-geolocate type="button"><?php echo esc_html(ya_t('detect')); ?></button></div></div>
<?php wp_footer(); ?>
</body></html>
