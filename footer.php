<?php
/**
 * Yama Ahmadi Pro — Premium Footer
 * Phase 4
 */

defined('ABSPATH') || exit;

$phone = get_theme_mod(
    'ya_phone',
    '+33 7 84 20 31 50'
);

$email = get_theme_mod(
    'ya_email',
    'support@yamaahmadi.fr'
);

$hours = get_theme_mod(
    'ya_hours',
    'Lun – Ven : 08:00 – 18:00'
);

$area = get_theme_mod(
    'ya_location',
    'France'
);

$linkedin = get_theme_mod('ya_linkedin');
$facebook = get_theme_mod('ya_facebook');
?>

</main>


<!-- =========================================================
     PREMIUM FOOTER
========================================================= -->
<footer class="ya-footer">

    <div class="ya-shell">


        <!-- =====================================================
             APP / PWA
        ====================================================== -->
        <section class="ya-app-strip reveal">

            <div class="ya-app-copy">

                <span class="ya-kicker">
                    PWA • MOBILE READY
                </span>

                <h2>
                    <?php echo esc_html(ya_t('app')); ?>
                </h2>

                <p>
                    <?php echo esc_html(ya_t('app_text')); ?>
                </p>

            </div>


            <div class="ya-store-row">

                <button
                    data-ya-install
                    class="ya-store"
                    type="button"
                >

                    <i class="fa-brands fa-google-play"></i>

                    <span>

                        <small>
                            Installer sur
                        </small>

                        <strong>
                            Android
                        </strong>

                    </span>

                </button>


                <button
                    data-ya-install
                    class="ya-store"
                    type="button"
                >

                    <i class="fa-brands fa-apple"></i>

                    <span>

                        <small>
                            Ajouter sur
                        </small>

                        <strong>
                            iPhone / iPad
                        </strong>

                    </span>

                </button>

            </div>

        </section>


        <!-- =====================================================
             MAIN FOOTER GRID
        ====================================================== -->
        <div class="ya-footer-main">


            <!-- BRAND -->
            <div class="ya-footer-brand-col">

                <a
                    class="ya-brand ya-footer-brand"
                    href="<?php echo esc_url(home_url('/')); ?>"
                >

                    <span
                        class="ya-brand-mark"
                        aria-hidden="true"
                    >
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>

                    <span class="ya-brand-copy">

                        <strong>
                            YAMA AHMADI
                        </strong>

                        <small>
                            IT SUPPORT &amp; SERVICES
                        </small>

                    </span>

                </a>


                <p>
                    Support informatique, réseaux, cybersécurité,
                    Microsoft 365, cloud, maintenance et assistance
                    professionnelle pour les entreprises en France.
                </p>


                <div class="ya-footer-badges">

                    <span>
                        <i class="fa-solid fa-shield-halved"></i>
                        IT sécurisé
                    </span>

                    <span>
                        <i class="fa-solid fa-location-dot"></i>
                        France
                    </span>

                    <span>
                        <i class="fa-solid fa-headset"></i>
                        Support L1/L2
                    </span>

                </div>


                <?php if ($linkedin || $facebook): ?>

                    <div class="ya-social">

                        <?php if ($linkedin): ?>

                            <a
                                href="<?php echo esc_url($linkedin); ?>"
                                target="_blank"
                                rel="noopener"
                                aria-label="LinkedIn"
                            >

                                <i class="fa-brands fa-linkedin-in"></i>

                            </a>

                        <?php endif; ?>


                        <?php if ($facebook): ?>

                            <a
                                href="<?php echo esc_url($facebook); ?>"
                                target="_blank"
                                rel="noopener"
                                aria-label="Facebook"
                            >

                                <i class="fa-brands fa-facebook-f"></i>

                            </a>

                        <?php endif; ?>

                    </div>

                <?php endif; ?>

            </div>


            <!-- SERVICES -->
            <div class="ya-footer-col">

                <h3>
                    <?php echo esc_html(ya_t('services')); ?>
                </h3>

                <a href="<?php echo esc_url(
                    ya_page('services') . '#support'
                ); ?>">
                    Support informatique
                </a>

                <a href="<?php echo esc_url(
                    ya_page('services') . '#network'
                ); ?>">
                    Réseaux & Wi-Fi
                </a>

                <a href="<?php echo esc_url(
                    ya_page('services') . '#security'
                ); ?>">
                    Cybersécurité
                </a>

                <a href="<?php echo esc_url(
                    ya_page('services') . '#cloud'
                ); ?>">
                    Microsoft 365 & Cloud
                </a>

                <a href="<?php echo esc_url(
                    ya_page('services') . '#infra'
                ); ?>">
                    Infrastructure IT
                </a>

            </div>


            <!-- COMPANY -->
            <div class="ya-footer-col">

                <h3>
                    Entreprise
                </h3>

                <a href="<?php echo esc_url(
                    ya_page('a-propos')
                ); ?>">
                    <?php echo esc_html(ya_t('about')); ?>
                </a>

                <a href="<?php echo esc_url(
                    ya_page('solutions')
                ); ?>">
                    <?php echo esc_html(ya_t('solutions')); ?>
                </a>

                <a href="<?php echo esc_url(
                    ya_page('projets')
                ); ?>">
                    <?php echo esc_html(ya_t('projects')); ?>
                </a>

                <a href="<?php echo esc_url(
                    ya_page('contact')
                ); ?>">
                    <?php echo esc_html(ya_t('contact')); ?>
                </a>

                <a href="<?php echo esc_url(
                    ya_page('demander-un-devis')
                ); ?>">
                    <?php echo esc_html(ya_t('quote')); ?>
                </a>

            </div>


            <!-- CONTACT -->
            <div class="ya-footer-col ya-footer-contact">

                <h3>
                    <?php echo esc_html(ya_t('contact')); ?>
                </h3>

                <a
                    href="tel:<?php echo esc_attr(
                        preg_replace('/\s+/', '', $phone)
                    ); ?>"
                >

                    <i class="fa-solid fa-phone"></i>

                    <span>
                        <?php echo esc_html($phone); ?>
                    </span>

                </a>


                <a
                    href="mailto:<?php echo esc_attr($email); ?>"
                >

                    <i class="fa-regular fa-envelope"></i>

                    <span>
                        <?php echo esc_html($email); ?>
                    </span>

                </a>


                <span>

                    <i class="fa-regular fa-clock"></i>

                    <?php echo esc_html($hours); ?>

                </span>


                <span>

                    <i class="fa-solid fa-location-dot"></i>

                    <?php echo esc_html($area); ?>

                </span>

            </div>


            <!-- LEGAL -->
            <div class="ya-footer-col">

                <h3>
                    Legal
                </h3>

                <a href="<?php echo esc_url(
                    ya_page('mentions-legales')
                ); ?>">
                    <?php echo esc_html(ya_t('legal')); ?>
                </a>

                <a href="<?php echo esc_url(
                    ya_page('politique-de-confidentialite')
                ); ?>">
                    <?php echo esc_html(ya_t('privacy')); ?>
                </a>

                <a href="<?php echo esc_url(
                    ya_page('politique-de-cookies')
                ); ?>">
                    <?php echo esc_html(ya_t('cookies')); ?>
                </a>

                <a href="<?php echo esc_url(
                    ya_page('conditions-utilisation')
                ); ?>">
                    <?php echo esc_html(ya_t('terms')); ?>
                </a>

            </div>

        </div>


        <!-- =====================================================
             FOOTER BOTTOM
        ====================================================== -->
        <div class="ya-footer-bottom">

            <span>
                © <?php echo esc_html(date('Y')); ?>
                Yama Ahmadi Services Informatiques.
            </span>

            <span>
                France • IT Support • Networks • Cybersecurity • Cloud
            </span>

        </div>

    </div>

</footer>


<!-- =========================================================
     PWA INSTALL TOAST
========================================================= -->
<div
    class="ya-install-toast"
    data-ya-install-toast
    hidden
>

    <div>

        <strong>
            <?php echo esc_html(ya_t('app')); ?>
        </strong>

        <small>
            Accès rapide depuis votre écran d’accueil
        </small>

    </div>

    <button
        data-ya-install
        type="button"
    >
        Installer
    </button>

    <button
        data-ya-install-close
        type="button"
        aria-label="Close"
    >
        ×
    </button>

</div>


<!-- =========================================================
     LOCATION MODAL
========================================================= -->
<div
    class="ya-location-modal"
    data-ya-location-modal
    aria-hidden="true"
>

    <div
        class="ya-location-backdrop"
        data-ya-location-close
    ></div>


    <div class="ya-location-card">

        <button
            class="ya-location-close"
            data-ya-location-close
            type="button"
            aria-label="Fermer"
        >
            ×
        </button>


        <div class="ya-location-icon">

            <i class="fa-solid fa-location-dot"></i>

        </div>


        <span class="ya-kicker">

            <?php echo esc_html(ya_t('location')); ?>

        </span>


        <h3>
            <?php echo esc_html(ya_t('coverage')); ?>
        </h3>


        <p>
            Votre localisation précise n’est utilisée que si vous
            l’autorisez dans votre navigateur.
        </p>


        <button
            class="ya-btn"
            data-ya-geolocate
            type="button"
        >

            <?php echo esc_html(ya_t('detect')); ?>

        </button>

    </div>

</div>


<?php wp_footer(); ?>

</body>

</html>