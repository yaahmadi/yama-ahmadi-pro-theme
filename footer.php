<?php
/**
 * Yama Ahmadi Pro v3.0.0 — Premium Footer & PWA App Shell
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
$instagram = get_theme_mod('ya_instagram');
$youtube = get_theme_mod('ya_youtube');
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

                    <i class="fa-brands fa-android"></i>

                    <span>

                        <small>
                            <?php echo esc_html(ya_t('install_on')); ?>
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
                            <?php echo esc_html(ya_t('add_to')); ?>
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
                    <?php echo esc_html(ya_t('footer_about')); ?>
                </p>


                <div class="ya-footer-badges">

                    <span>
                        <i class="fa-solid fa-shield-halved"></i>
                        <?php echo esc_html(ya_t('secure_it')); ?>
                    </span>

                    <span>
                        <i class="fa-solid fa-location-dot"></i>
                        France
                    </span>

                    <span>
                        <i class="fa-solid fa-headset"></i>
                        <?php echo esc_html(ya_t('l1l2')); ?>
                    </span>

                </div>


                <div class="ya-social" aria-label="<?php echo esc_html(ya_t('social')); ?>">

                    <?php if ($linkedin): ?>
                        <a
                            href="<?php echo esc_url($linkedin); ?>"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="LinkedIn"
                        >
                            <i class="fa-brands fa-linkedin-in"></i>
                        </a>
                    <?php else: ?>
                        <span class="ya-social-placeholder" aria-label="LinkedIn">
                            <i class="fa-brands fa-linkedin-in"></i>
                        </span>
                    <?php endif; ?>

                    <?php if ($facebook): ?>
                        <a
                            href="<?php echo esc_url($facebook); ?>"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="Facebook"
                        >
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                    <?php else: ?>
                        <span class="ya-social-placeholder" aria-label="Facebook">
                            <i class="fa-brands fa-facebook-f"></i>
                        </span>
                    <?php endif; ?>

                    <?php if ($instagram): ?>
                        <a
                            href="<?php echo esc_url($instagram); ?>"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="Instagram"
                        >
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    <?php else: ?>
                        <span class="ya-social-placeholder" aria-label="Instagram">
                            <i class="fa-brands fa-instagram"></i>
                        </span>
                    <?php endif; ?>

                    <?php if ($youtube): ?>
                        <a
                            href="<?php echo esc_url($youtube); ?>"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="YouTube"
                        >
                            <i class="fa-brands fa-youtube"></i>
                        </a>
                    <?php else: ?>
                        <span class="ya-social-placeholder" aria-label="YouTube">
                            <i class="fa-brands fa-youtube"></i>
                        </span>
                    <?php endif; ?>

                </div>

            </div>


            <!-- SERVICES -->
            <div class="ya-footer-col">

                <h3>
                    <?php echo esc_html(ya_t('services')); ?>
                </h3>

                <a href="<?php echo esc_url(
                    ya_page('services') . '#support'
                ); ?>">
                    <?php echo esc_html(ya_t('svc_support')); ?>
                </a>

                <a href="<?php echo esc_url(
                    ya_page('services') . '#network'
                ); ?>">
                    <?php echo esc_html(ya_t('svc_network')); ?>
                </a>

                <a href="<?php echo esc_url(
                    ya_page('services') . '#security'
                ); ?>">
                    <?php echo esc_html(ya_t('svc_security')); ?>
                </a>

                <a href="<?php echo esc_url(
                    ya_page('services') . '#cloud'
                ); ?>">
                    Microsoft 365 & Cloud
                </a>

                <a href="<?php echo esc_url(
                    ya_page('services') . '#infra'
                ); ?>">
                    <?php echo esc_html(ya_t('svc_infra')); ?>
                </a>

            </div>


            <!-- COMPANY -->
            <div class="ya-footer-col">

                <h3>
                    <?php echo esc_html(ya_t('company')); ?>
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
                    <?php echo esc_html(ya_t('legal_info')); ?>
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
                <?php echo esc_html(ya_t('copyright')); ?>
            </span>

            <span>
                France • Support IT • Réseaux • <?php echo esc_html(ya_t('svc_security')); ?> • Cloud
            </span>

        </div>

    </div>

</footer>


<!-- =========================================================
     PWA APP BOTTOM NAVIGATION
========================================================= -->
<nav
    class="ya-app-bottom-nav"
    data-ya-app-bottom-nav
    aria-label="<?php
        echo esc_attr(
            ya_lang() === 'en'
                ? 'App navigation'
                : (
                    ya_lang() === 'de'
                        ? 'App-Navigation'
                        : 'Navigation de l’application'
                )
        );
    ?>"
>
    <a
        href="<?php echo esc_url(function_exists('ya_home_url') ? ya_home_url() : home_url('/')); ?>"
        class="<?php echo is_front_page() ? 'active' : ''; ?>"
    >
        <i class="fa-solid fa-house"></i>
        <span><?php echo esc_html(ya_t('home')); ?></span>
    </a>

    <a
        href="<?php echo esc_url(ya_page('services')); ?>"
        class="<?php echo is_page(['services','service','it-services']) ? 'active' : ''; ?>"
    >
        <i class="fa-solid fa-layer-group"></i>
        <span><?php echo esc_html(ya_t('services')); ?></span>
    </a>

    <button
        type="button"
        class="ya-app-nav-primary"
        data-ya-app-search-open
        aria-label="<?php
            echo esc_attr(
                ya_lang() === 'en'
                    ? 'Open search'
                    : (
                        ya_lang() === 'de'
                            ? 'Suche öffnen'
                            : 'Ouvrir la recherche'
                    )
            );
        ?>"
    >
        <span class="ya-app-nav-primary-icon">
            <i class="fa-solid fa-magnifying-glass"></i>
        </span>
        <span>
            <?php
            echo esc_html(
                ya_lang() === 'en'
                    ? 'Search'
                    : (
                        ya_lang() === 'de'
                            ? 'Suchen'
                            : 'Recherche'
                    )
            );
            ?>
        </span>
    </button>

    <a
        href="<?php echo esc_url(ya_page('contact')); ?>"
        class="<?php echo is_page(['contact','contact-us']) ? 'active' : ''; ?>"
    >
        <i class="fa-regular fa-message"></i>
        <span><?php echo esc_html(ya_t('contact')); ?></span>
    </a>

    <button
        type="button"
        data-ya-app-more-open
        aria-label="<?php
            echo esc_attr(
                ya_lang() === 'en'
                    ? 'Open more menu'
                    : (
                        ya_lang() === 'de'
                            ? 'Mehr-Menü öffnen'
                            : 'Ouvrir le menu Plus'
                    )
            );
        ?>"
    >
        <i class="fa-solid fa-ellipsis"></i>
        <span>
            <?php
            echo esc_html(
                ya_lang() === 'en'
                    ? 'More'
                    : (
                        ya_lang() === 'de'
                            ? 'Mehr'
                            : 'Plus'
                    )
            );
            ?>
        </span>
    </button>
</nav>


<!-- =========================================================
     PWA SEARCH PANEL
========================================================= -->
<div
    class="ya-app-search"
    data-ya-app-search
    aria-hidden="true"
>
    <div
        class="ya-app-sheet-backdrop"
        data-ya-app-search-close
    ></div>

    <section
        class="ya-app-sheet ya-app-search-sheet"
        role="dialog"
        aria-modal="true"
        aria-labelledby="ya-app-search-title"
    >
        <div class="ya-app-sheet-handle" aria-hidden="true"></div>

        <header class="ya-app-sheet-head">
            <div>
                <span class="ya-kicker">
                    <?php
                    echo esc_html(
                        ya_lang() === 'en'
                            ? 'QUICK SEARCH'
                            : (
                                ya_lang() === 'de'
                                    ? 'SCHNELLSUCHE'
                                    : 'RECHERCHE RAPIDE'
                            )
                    );
                    ?>
                </span>

                <h2 id="ya-app-search-title">
                    <?php
                    echo esc_html(
                        ya_lang() === 'en'
                            ? 'Find a service or article'
                            : (
                                ya_lang() === 'de'
                                    ? 'Service oder Artikel finden'
                                    : 'Trouver un service ou un article'
                            )
                    );
                    ?>
                </h2>
            </div>

            <button
                type="button"
                class="ya-app-sheet-close"
                data-ya-app-search-close
                aria-label="<?php echo esc_attr(ya_t('close')); ?>"
            >
                <i class="fa-solid fa-xmark"></i>
            </button>
        </header>

        <form
            class="ya-app-search-form"
            role="search"
            method="get"
            action="<?php echo esc_url(home_url('/')); ?>"
        >
            <label class="screen-reader-text" for="ya-app-search-input">
                <?php
                echo esc_html(
                    ya_lang() === 'en'
                        ? 'Search'
                        : (
                            ya_lang() === 'de'
                                ? 'Suchen'
                                : 'Rechercher'
                        )
                );
                ?>
            </label>

            <i class="fa-solid fa-magnifying-glass"></i>

            <input
                id="ya-app-search-input"
                name="s"
                type="search"
                autocomplete="off"
                placeholder="<?php
                    echo esc_attr(
                        ya_lang() === 'en'
                            ? 'Search IT support, network, cloud…'
                            : (
                                ya_lang() === 'de'
                                    ? 'IT-Support, Netzwerk, Cloud suchen…'
                                    : 'Rechercher support, réseau, cloud…'
                            )
                    );
                ?>"
            >

            <?php if (ya_lang() !== 'fr') : ?>
                <input type="hidden" name="lang" value="<?php echo esc_attr(ya_lang()); ?>">
            <?php endif; ?>
        </form>

        <div class="ya-app-search-suggestions">
            <h3>
                <?php
                echo esc_html(
                    ya_lang() === 'en'
                        ? 'Popular'
                        : (
                            ya_lang() === 'de'
                                ? 'Beliebt'
                                : 'Populaire'
                        )
                );
                ?>
            </h3>

            <?php
            $app_search_links = [
                [
                    'icon' => 'fa-headset',
                    'label' => ya_lang() === 'en' ? 'IT Support' : (ya_lang() === 'de' ? 'IT-Support' : 'Support informatique'),
                    'url' => function_exists('ya_service_article_url') ? ya_service_article_url('support') : ya_page('services'),
                ],
                [
                    'icon' => 'fa-network-wired',
                    'label' => ya_lang() === 'en' ? 'Networks & Wi-Fi' : (ya_lang() === 'de' ? 'Netzwerke & Wi-Fi' : 'Réseaux & Wi-Fi'),
                    'url' => function_exists('ya_service_article_url') ? ya_service_article_url('network') : ya_page('services'),
                ],
                [
                    'icon' => 'fa-shield-halved',
                    'label' => ya_lang() === 'en' ? 'Cybersecurity' : (ya_lang() === 'de' ? 'Cybersicherheit' : 'Cybersécurité'),
                    'url' => function_exists('ya_service_article_url') ? ya_service_article_url('security') : ya_page('services'),
                ],
                [
                    'icon' => 'fa-cloud',
                    'label' => 'Microsoft 365 & Cloud',
                    'url' => function_exists('ya_service_article_url') ? ya_service_article_url('cloud') : ya_page('services'),
                ],
                [
                    'icon' => 'fa-server',
                    'label' => ya_lang() === 'en' ? 'IT Infrastructure' : (ya_lang() === 'de' ? 'IT-Infrastruktur' : 'Infrastructure IT'),
                    'url' => function_exists('ya_service_article_url') ? ya_service_article_url('infra') : ya_page('services'),
                ],
                [
                    'icon' => 'fa-briefcase',
                    'label' => ya_t('projects'),
                    'url' => ya_page('projets'),
                ],
            ];

            foreach ($app_search_links as $app_link) :
            ?>
                <a href="<?php echo esc_url($app_link['url']); ?>">
                    <i class="fa-solid <?php echo esc_attr($app_link['icon']); ?>"></i>
                    <span><?php echo esc_html($app_link['label']); ?></span>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            <?php endforeach; ?>
        </div>
    </section>
</div>


<!-- =========================================================
     PWA MORE PANEL
========================================================= -->
<div
    class="ya-app-more"
    data-ya-app-more
    aria-hidden="true"
>
    <div
        class="ya-app-sheet-backdrop"
        data-ya-app-more-close
    ></div>

    <section
        class="ya-app-sheet ya-app-more-sheet"
        role="dialog"
        aria-modal="true"
        aria-labelledby="ya-app-more-title"
    >
        <div class="ya-app-sheet-handle" aria-hidden="true"></div>

        <header class="ya-app-sheet-head">
            <div>
                <span class="ya-kicker">
                    YAMA AHMADI
                </span>

                <h2 id="ya-app-more-title">
                    <?php
                    echo esc_html(
                        ya_lang() === 'en'
                            ? 'More options'
                            : (
                                ya_lang() === 'de'
                                    ? 'Weitere Optionen'
                                    : 'Plus d’options'
                            )
                    );
                    ?>
                </h2>
            </div>

            <button
                type="button"
                class="ya-app-sheet-close"
                data-ya-app-more-close
                aria-label="<?php echo esc_attr(ya_t('close')); ?>"
            >
                <i class="fa-solid fa-xmark"></i>
            </button>
        </header>

        <div class="ya-app-more-grid">
            <a href="<?php echo esc_url(ya_page('a-propos')); ?>">
                <i class="fa-solid fa-user-gear"></i>
                <span><?php echo esc_html(ya_t('about')); ?></span>
            </a>

            <a href="<?php echo esc_url(ya_page('solutions')); ?>">
                <i class="fa-solid fa-diagram-project"></i>
                <span><?php echo esc_html(ya_t('solutions')); ?></span>
            </a>

            <a href="<?php echo esc_url(ya_page('projets')); ?>">
                <i class="fa-solid fa-briefcase"></i>
                <span><?php echo esc_html(ya_t('projects')); ?></span>
            </a>

            <a href="<?php echo esc_url(ya_page('demander-un-devis')); ?>">
                <i class="fa-solid fa-file-signature"></i>
                <span><?php echo esc_html(ya_t('quote')); ?></span>
            </a>

            <a href="tel:<?php echo esc_attr(preg_replace('/\s+/', '', $phone)); ?>">
                <i class="fa-solid fa-phone"></i>
                <span>
                    <?php
                    echo esc_html(
                        ya_lang() === 'en'
                            ? 'Call'
                            : (
                                ya_lang() === 'de'
                                    ? 'Anrufen'
                                    : 'Appeler'
                            )
                    );
                    ?>
                </span>
            </a>

            <a href="mailto:<?php echo esc_attr($email); ?>">
                <i class="fa-regular fa-envelope"></i>
                <span>Email</span>
            </a>
        </div>

        <div class="ya-app-language-card">
            <div>
                <i class="fa-solid fa-language"></i>
                <span><?php echo esc_html(ya_t('language')); ?></span>
            </div>

            <div class="ya-app-language-options">
                <?php foreach (ya_languages() as $code => $language_item) : ?>
                    <a
                        class="<?php echo $code === ya_lang() ? 'active' : ''; ?>"
                        href="<?php echo esc_url(ya_url_lang($code)); ?>"
                    >
                        <span><?php echo esc_html($language_item['flag']); ?></span>
                        <strong><?php echo esc_html($language_item['short']); ?></strong>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
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
            aria-label="<?php echo esc_html(ya_t('close')); ?>"
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
            <?php echo esc_html(ya_t('location_text')); ?>
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



<!-- =========================================================
     BACK TO TOP — LEFT SIDE
========================================================= -->
<button
    class="ya-back-top"
    data-ya-back-top
    type="button"
    aria-label="<?php echo esc_html(ya_t('back_top')); ?>"
>
    <i class="fa-solid fa-arrow-up"></i>
</button>


<?php wp_footer(); ?>

</body>

</html>