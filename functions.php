<?php
defined('ABSPATH') || exit;

define('YA_VERSION', '3.0.0');

/* =========================================================
   THEME SETUP
========================================================= */

function ya_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    add_theme_support(
        'custom-logo',
        [
            'height'      => 80,
            'width'       => 320,
            'flex-height' => true,
            'flex-width'  => true,
        ]
    );

    add_theme_support(
        'html5',
        [
            'search-form',
            'gallery',
            'caption',
            'style',
            'script',
        ]
    );

    add_theme_support('align-wide');
    add_theme_support('responsive-embeds');

    register_nav_menus(
        [
            'primary' => __('Primary Menu', 'yama-ahmadi-pro'),
            'footer'  => __('Footer Menu', 'yama-ahmadi-pro'),
        ]
    );
}
add_action('after_setup_theme', 'ya_setup');


/* =========================================================
   ASSETS
========================================================= */

function ya_assets() {

    $css_file = get_template_directory() . '/assets/css/main.css';
    $js_file  = get_template_directory() . '/assets/js/main.js';

    $css_version = file_exists($css_file)
        ? filemtime($css_file)
        : YA_VERSION;

    $js_version = file_exists($js_file)
        ? filemtime($js_file)
        : YA_VERSION;

    wp_enqueue_style(
        'ya-fontawesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css',
        [],
        '6.7.2'
    );

    wp_enqueue_style(
        'ya-main',
        get_template_directory_uri() . '/assets/css/main.css',
        [],
        $css_version
    );

    wp_enqueue_script(
        'ya-main',
        get_template_directory_uri() . '/assets/js/main.js',
        [],
        $js_version,
        true
    );

    wp_localize_script(
        'ya-main',
        'YAMA_SITE',
        [
            'home'     => home_url('/'),
            'ajax'     => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('ya_nonce'),
            'lang'     => ya_lang(),
            'manifest' => home_url('/manifest.webmanifest'),
            'themeUrl' => get_template_directory_uri(),
        ]
    );
}
add_action('wp_enqueue_scripts', 'ya_assets');


/* =========================================================
   LANGUAGES
========================================================= */

function ya_languages() {
    return [
        'fr' => [
            'label' => 'Français',
            'short' => 'FR',
            'flag'  => '🇫🇷',
        ],
        'en' => [
            'label' => 'English',
            'short' => 'EN',
            'flag'  => '🇺🇸',
        ],
        'de' => [
            'label' => 'Deutsch',
            'short' => 'DE',
            'flag'  => '🇩🇪',
        ],
    ];
}

function ya_lang() {

    $langs = ya_languages();
    $cookie_name = 'ya_lang_v2';

    /*
     * A language changes only when the visitor explicitly selects it
     * with ?lang=fr, ?lang=en or ?lang=de.
     *
     * We intentionally ignore the previous ya_lang cookie so an old
     * automatic English/German selection cannot override the French
     * homepage after the v2.6 update.
     */
    if (
        isset($_GET['lang']) &&
        isset($langs[sanitize_key($_GET['lang'])])
    ) {
        $lang = sanitize_key($_GET['lang']);

        if (!headers_sent()) {
            setcookie(
                $cookie_name,
                $lang,
                [
                    'expires'  => time() + YEAR_IN_SECONDS,
                    'path'     => COOKIEPATH ?: '/',
                    'domain'   => COOKIE_DOMAIN ?: '',
                    'secure'   => is_ssl(),
                    'httponly' => false,
                    'samesite' => 'Lax',
                ]
            );

            /*
             * Remove the legacy cookie that may have been created by
             * the former browser-language auto detection.
             */
            setcookie(
                'ya_lang',
                '',
                [
                    'expires'  => time() - HOUR_IN_SECONDS,
                    'path'     => COOKIEPATH ?: '/',
                    'domain'   => COOKIE_DOMAIN ?: '',
                    'secure'   => is_ssl(),
                    'httponly' => false,
                    'samesite' => 'Lax',
                ]
            );
        }

        $_COOKIE[$cookie_name] = $lang;
        unset($_COOKIE['ya_lang']);

        return $lang;
    }

    if (
        isset($_COOKIE[$cookie_name]) &&
        isset($langs[sanitize_key($_COOKIE[$cookie_name])])
    ) {
        return sanitize_key($_COOKIE[$cookie_name]);
    }

    /*
     * French is always the default language.
     */
    return 'fr';
}

function ya_url_lang($lang) {

    $langs = ya_languages();
    $lang  = sanitize_key($lang);

    if (!isset($langs[$lang])) {
        $lang = 'fr';
    }

    $path = wp_parse_url(
        $_SERVER['REQUEST_URI'] ?? '/',
        PHP_URL_PATH
    );

    return add_query_arg(
        'lang',
        $lang,
        home_url($path ?: '/')
    );
}


/* =========================================================
   TRANSLATIONS
========================================================= */

function ya_t($key) {

    $translations = [

        'fr' => [
            'home'           => 'Accueil',
            'about'          => 'À propos',
            'services'       => 'Services',
            'solutions'      => 'Solutions',
            'projects'       => 'Projets',
            'blog'           => 'Blog',
            'contact'        => 'Contact',
            'quote'          => 'Demander un devis',
            'location'       => 'Zone d’intervention',
            'france'         => 'France',
            'hero_kicker'    => 'YAMA AHMADI • SERVICES INFORMATIQUES',
            'hero_title'     => 'Des solutions IT fiables pour votre entreprise.',
            'hero_text'      => 'Support informatique, réseaux, cybersécurité, Microsoft 365, cloud et assistance terrain pour les entreprises qui exigent fiabilité, sécurité et réactivité.',
            'hero_cta'       => 'Découvrir nos services',
            'hero_quote'     => 'Demander un devis',
            'services_title' => 'Des services IT complets pour répondre à vos besoins',
            'services_intro' => 'Des solutions professionnelles sur site et à distance pour maintenir, sécuriser et faire évoluer votre environnement informatique.',
            'why'            => 'Pourquoi choisir Yama Ahmadi',
            'why_title'      => 'Un support informatique rapide, clair et professionnel',
            'coverage'       => 'Interventions partout en France',
            'certified'      => 'Compétences & certifications IT',
            'response'       => 'Réponse rapide selon disponibilité',
            'cta_title'      => 'Besoin d’un expert informatique ?',
            'cta_text'       => 'Expliquez votre besoin et recevez une réponse claire et professionnelle.',
            'app'            => 'Installez notre application',
            'app_text'       => 'Ajoutez Yama Ahmadi à votre écran d’accueil pour un accès rapide.',
            'privacy'        => 'Confidentialité',
            'legal'          => 'Mentions légales',
            'cookies'        => 'Cookies',
            'terms'          => 'Conditions d’utilisation',
            'detect'         => 'Détecter ma localisation',
            'language'       => 'Langue',
            'close'          => 'Fermer',
            'readmore'       => 'En savoir plus',
            'latest'         => 'Conseils & actualités informatiques',
            'latest_intro'   => 'Guides, sécurité, réseaux et bonnes pratiques pour votre entreprise.',
            'install_on' => 'Installer sur',
            'add_to' => 'Ajouter sur',
            'footer_about' => 'Support informatique, réseaux, cybersécurité, Microsoft 365, cloud, maintenance et assistance professionnelle pour les entreprises en France.',
            'secure_it' => 'IT sécurisé',
            'l1l2' => 'Support L1/L2',
            'social' => 'Réseaux sociaux',
            'svc_support' => 'Support informatique',
            'svc_network' => 'Réseaux & Wi-Fi',
            'svc_security' => 'Cybersécurité',
            'svc_infra' => 'Infrastructure IT',
            'company' => 'Entreprise',
            'legal_info' => 'Informations légales',
            'copyright' => 'Yama Ahmadi Services Informatiques.',
            'footer_tagline' => 'France • Support IT • Réseaux • Cybersécurité • Cloud',
            'location_text' => 'Votre localisation précise n’est utilisée que si vous l’autorisez dans votre navigateur.',
            'back_top' => 'Retour en haut',
        ],

        'en' => [
            'home'           => 'Home',
            'about'          => 'About',
            'services'       => 'Services',
            'solutions'      => 'Solutions',
            'projects'       => 'Projects',
            'blog'           => 'Insights',
            'contact'        => 'Contact',
            'quote'          => 'Request a quote',
            'location'       => 'Zone d’intervention',
            'france'         => 'France',
            'hero_kicker'    => 'YAMA AHMADI • IT SERVICES',
            'hero_title'     => 'Reliable IT solutions for your business.',
            'hero_text'      => 'IT support, networks, cybersecurity, Microsoft 365, cloud and field services for businesses that require reliability, security and responsiveness.',
            'hero_cta'       => 'Explore our services',
            'hero_quote'     => 'Request a quote',
            'services_title' => 'Complete IT services for your needs',
            'services_intro' => 'Professional on-site and remote solutions to maintain, secure and improve your IT environment.',
            'why'            => 'Why choose Yama Ahmadi',
            'why_title'      => 'Fast, clear and professional IT support',
            'coverage'       => 'Coverage across France',
            'certified'      => 'IT skills & certifications',
            'response'       => 'Fast response subject to availability',
            'cta_title'      => 'Need an IT expert?',
            'cta_text'       => 'Tell us what you need and receive a clear professional response.',
            'app'            => 'Install our app',
            'app_text'       => 'Add Yama Ahmadi to your home screen for faster access.',
            'privacy'        => 'Privacy',
            'legal'          => 'Legal notice',
            'cookies'        => 'Cookies',
            'terms'          => 'Terms of use',
            'detect'         => 'Detect my location',
            'language'       => 'Language',
            'close'          => 'Close',
            'readmore'       => 'Learn more',
            'latest'         => 'IT insights & updates',
            'latest_intro'   => 'Practical guidance on security, networking and business IT.',
            'install_on' => 'Install on',
            'add_to' => 'Add to',
            'footer_about' => 'IT support, networks, cybersecurity, Microsoft 365, cloud, maintenance and professional assistance for businesses across France.',
            'secure_it' => 'Secure IT',
            'l1l2' => 'L1/L2 Support',
            'social' => 'Social media',
            'svc_support' => 'IT Support',
            'svc_network' => 'Networks & Wi-Fi',
            'svc_security' => 'Cybersecurity',
            'svc_infra' => 'IT Infrastructure',
            'company' => 'Company',
            'legal_info' => 'Legal information',
            'copyright' => 'Yama Ahmadi IT Services.',
            'footer_tagline' => 'France • IT Support • Networks • Cybersecurity • Cloud',
            'location_text' => 'Your precise location is used only if you allow it in your browser.',
            'back_top' => 'Back to top',
        ],

        'de' => [
            'home'           => 'Startseite',
            'about'          => 'Über uns',
            'services'       => 'Services',
            'solutions'      => 'Lösungen',
            'projects'       => 'Projekte',
            'blog'           => 'Blog',
            'contact'        => 'Kontakt',
            'quote'          => 'Angebot anfordern',
            'location'       => 'Einsatzgebiet',
            'france'         => 'Frankreich',
            'hero_kicker'    => 'YAMA AHMADI • IT-SERVICES',
            'hero_title'     => 'Zuverlässige IT-Lösungen für Ihr Unternehmen.',
            'hero_text'      => 'IT-Support, Netzwerke, Cybersicherheit, Microsoft 365, Cloud und Vor-Ort-Service für Unternehmen mit hohen Ansprüchen an Sicherheit und Zuverlässigkeit.',
            'hero_cta'       => 'Services entdecken',
            'hero_quote'     => 'Angebot anfordern',
            'services_title' => 'Komplette IT-Services für Ihren Bedarf',
            'services_intro' => 'Professionelle Vor-Ort- und Remote-Lösungen für Wartung, Sicherheit und Weiterentwicklung Ihrer IT.',
            'why'            => 'Warum Yama Ahmadi',
            'why_title'      => 'Schneller, klarer und professioneller IT-Support',
            'coverage'       => 'Einsätze in ganz Frankreich',
            'certified'      => 'IT-Kompetenzen & Zertifizierungen',
            'response'       => 'Schnelle Reaktion nach Verfügbarkeit',
            'cta_title'      => 'Benötigen Sie einen IT-Experten?',
            'cta_text'       => 'Beschreiben Sie Ihren Bedarf und erhalten Sie eine klare professionelle Antwort.',
            'app'            => 'App installieren',
            'app_text'       => 'Fügen Sie Yama Ahmadi für schnellen Zugriff zum Startbildschirm hinzu.',
            'privacy'        => 'Datenschutz',
            'legal'          => 'Impressum',
            'cookies'        => 'Cookies',
            'terms'          => 'Nutzungsbedingungen',
            'detect'         => 'Standort erkennen',
            'language'       => 'Sprache',
            'close'          => 'Schließen',
            'readmore'       => 'Mehr erfahren',
            'latest'         => 'IT-Tipps & Neuigkeiten',
            'latest_intro'   => 'Praxisnahe Hinweise zu Sicherheit, Netzwerken und Business-IT.',
            'install_on' => 'Installieren auf',
            'add_to' => 'Hinzufügen zu',
            'footer_about' => 'IT-Support, Netzwerke, Cybersicherheit, Microsoft 365, Cloud, Wartung und professionelle Unterstützung für Unternehmen in Frankreich.',
            'secure_it' => 'Sichere IT',
            'l1l2' => 'L1/L2-Support',
            'social' => 'Soziale Medien',
            'svc_support' => 'IT-Support',
            'svc_network' => 'Netzwerke & Wi-Fi',
            'svc_security' => 'Cybersicherheit',
            'svc_infra' => 'IT-Infrastruktur',
            'company' => 'Unternehmen',
            'legal_info' => 'Rechtliche Informationen',
            'copyright' => 'Yama Ahmadi IT-Services.',
            'footer_tagline' => 'Frankreich • IT-Support • Netzwerke • Cybersicherheit • Cloud',
            'location_text' => 'Ihr genauer Standort wird nur verwendet, wenn Sie dies im Browser erlauben.',
            'back_top' => 'Nach oben',
        ],
    ];

    $lang = ya_lang();

    return $translations[$lang][$key]
        ?? $translations['fr'][$key]
        ?? $key;
}


/* =========================================================
   PAGE HELPERS
========================================================= */

function ya_page($slug) {

    $requested = sanitize_title($slug);

    /*
     * Canonical page aliases.
     * This keeps links reliable even when WordPress contains an older
     * English slug while the visible website is French.
     */
    $aliases = [

        'home' => [
            '',
            'accueil',
            'home',
        ],

        'accueil' => [
            '',
            'accueil',
            'home',
        ],

        'a-propos' => [
            'a-propos',
            'about',
        ],

        'about' => [
            'a-propos',
            'about',
        ],

        'services' => [
            'services',
        ],

        'solutions' => [
            'solutions',
        ],

        'contact' => [
            'contact',
        ],

        'demander-un-devis' => [
            'demande-de-devis',
            'demander-un-devis',
            'request-a-quote',
            'request-quote',
            'quote',
        ],

        'demande-de-devis' => [
            'demande-de-devis',
            'demander-un-devis',
            'request-a-quote',
            'request-quote',
            'quote',
        ],

        'request-a-quote' => [
            'demande-de-devis',
            'demander-un-devis',
            'request-a-quote',
            'request-quote',
            'quote',
        ],

        'mentions-legales' => [
            'mentions-legales',
            'legal-notice',
        ],

        'confidentialite' => [
            'confidentialite',
            'privacy-policy',
        ],

        'cookies' => [
            'cookies',
            'cookie-policy',
        ],

        'conditions-utilisation' => [
            'conditions-utilisation',
            'conditions-dutilisation',
            'terms-of-use',
        ],

        'support' => [
            'support',
        ],

        'blog' => [
            'blog',
        ],

        'projets' => [
            'projets',
            'projects',
        ],

        'projects' => [
            'projets',
            'projects',
        ],
    ];

    /*
     * Homepage is always the real WordPress front page.
     */
    if (
        '' === $requested ||
        'home' === $requested ||
        'accueil' === $requested
    ) {
        $url = home_url('/');
    } else {

        $candidates = $aliases[$requested] ?? [$requested];
        $url = '';

        foreach ($candidates as $candidate) {

            if ('' === $candidate) {
                $url = home_url('/');
                break;
            }

            $page = get_page_by_path(
                $candidate,
                OBJECT,
                'page'
            );

            if (
                $page instanceof WP_Post &&
                'publish' === $page->post_status
            ) {
                $url = get_permalink($page);
                break;
            }
        }

        /*
         * Final fallback uses the preferred canonical slug.
         */
        if (!$url) {
            $preferred = $candidates[0] ?? $requested;
            $url = home_url('/' . trim($preferred, '/') . '/');
        }
    }

    /*
     * French is the canonical/default website.
     * Only translated views need a query parameter.
     */
    if (
        function_exists('ya_lang') &&
        in_array(
            ya_lang(),
            ['en', 'de'],
            true
        )
    ) {
        $url = add_query_arg(
            'lang',
            ya_lang(),
            $url
        );
    }

    return $url;
}


function ya_home_url() {

    $url  = home_url('/');
    $lang = ya_lang();

    if (in_array($lang, ['en', 'de'], true)) {
        $url = add_query_arg('lang', $lang, $url);
    }

    return $url;
}


/*
 * Preserve English/German on standard WordPress post links.
 */
function ya_language_permalink($url) {

    if (is_admin()) {
        return $url;
    }

    $lang = ya_lang();

    if (in_array($lang, ['en', 'de'], true)) {
        return add_query_arg('lang', $lang, $url);
    }

    return remove_query_arg('lang', $url);
}
add_filter('post_link', 'ya_language_permalink');
add_filter('page_link', 'ya_language_permalink');





/* =========================================================
   MULTILINGUAL WORDPRESS MENU + PAGE TITLES
========================================================= */

function ya_menu_translation_map() {

    return [

        'fr' => [
            'home'       => 'Accueil',
            'about'      => 'À propos',
            'services'   => 'Services',
            'solutions'  => 'Solutions',
            'projects'   => 'Projets',
            'blog'       => 'Blog',
            'contact'    => 'Contact',
            'quote'      => 'Demander un devis',
        ],

        'en' => [
            'home'       => 'Home',
            'about'      => 'About',
            'services'   => 'Services',
            'solutions'  => 'Solutions',
            'projects'   => 'Projects',
            'blog'       => 'Insights',
            'contact'    => 'Contact',
            'quote'      => 'Request a quote',
        ],

        'de' => [
            'home'       => 'Startseite',
            'about'      => 'Über uns',
            'services'   => 'Services',
            'solutions'  => 'Lösungen',
            'projects'   => 'Projekte',
            'blog'       => 'Blog',
            'contact'    => 'Kontakt',
            'quote'      => 'Angebot anfordern',
        ],
    ];
}


function ya_menu_item_key($item) {

    $url   = !empty($item->url)
        ? (string) $item->url
        : '';

    $title = !empty($item->title)
        ? sanitize_title($item->title)
        : '';

    $path = wp_parse_url(
        $url,
        PHP_URL_PATH
    );

    $slug = sanitize_title(
        basename(
            untrailingslashit(
                $path ?: '/'
            )
        )
    );

    $home_url = trailingslashit(
        home_url('/')
    );

    $item_url = trailingslashit(
        remove_query_arg(
            'lang',
            $url
        )
    );

    if (
        $item_url === $home_url ||
        in_array(
            $slug,
            ['', 'home', 'accueil'],
            true
        ) ||
        in_array(
            $title,
            ['home', 'accueil', 'startseite'],
            true
        )
    ) {
        return 'home';
    }

    $aliases = [

        'about' => [
            'a-propos',
            'about',
            'about-us',
            'uber-uns',
            'ueber-uns',
        ],

        'services' => [
            'services',
            'service',
            'it-services',
        ],

        'solutions' => [
            'solutions',
            'solution',
            'losungen',
            'loesungen',
        ],

        'projects' => [
            'projets',
            'projects',
            'experiences',
            'projekte',
        ],

        'blog' => [
            'blog',
            'insights',
            'actualites',
            'news',
        ],

        'contact' => [
            'contact',
            'contact-us',
            'kontakt',
        ],

        'quote' => [
            'demander-un-devis',
            'demande-de-devis',
            'request-a-quote',
            'request-quote',
            'quote',
            'angebot-anfordern',
        ],
    ];

    foreach ($aliases as $key => $values) {

        if (
            in_array($slug, $values, true) ||
            in_array($title, $values, true)
        ) {
            return $key;
        }
    }

    return '';
}


function ya_translate_menu_item_title(
    $title,
    $item,
    $args,
    $depth
) {

    if (is_admin()) {
        return $title;
    }

    $key = ya_menu_item_key($item);

    if (!$key) {
        return $title;
    }

    $translations = ya_menu_translation_map();
    $lang         = ya_lang();

    return $translations[$lang][$key]
        ?? $translations['fr'][$key]
        ?? $title;
}
add_filter(
    'nav_menu_item_title',
    'ya_translate_menu_item_title',
    10,
    4
);


/*
 * Preserve the selected language in every WordPress menu URL.
 */
function ya_translate_menu_item_url($atts, $item, $args, $depth) {

    if (
        is_admin() ||
        empty($atts['href'])
    ) {
        return $atts;
    }

    $lang = ya_lang();

    if (in_array($lang, ['en', 'de'], true)) {
        $atts['href'] = add_query_arg(
            'lang',
            $lang,
            $atts['href']
        );
    } else {
        $atts['href'] = remove_query_arg(
            'lang',
            $atts['href']
        );
    }

    return $atts;
}
add_filter(
    'nav_menu_link_attributes',
    'ya_translate_menu_item_url',
    10,
    4
);


/*
 * Translate standard WordPress page titles when they appear outside
 * the custom premium templates, without modifying the database title.
 */
function ya_frontend_page_title($title, $post_id = 0) {

    if (
        is_admin() ||
        !$post_id ||
        'page' !== get_post_type($post_id)
    ) {
        return $title;
    }

    $post = get_post($post_id);

    if (!$post instanceof WP_Post) {
        return $title;
    }

    $fake_item = (object) [
        'url'   => get_permalink($post),
        'title' => $post->post_title,
    ];

    $key = ya_menu_item_key($fake_item);

    if (!$key) {
        return $title;
    }

    $translations = ya_menu_translation_map();
    $lang         = ya_lang();

    return $translations[$lang][$key]
        ?? $title;
}
add_filter(
    'the_title',
    'ya_frontend_page_title',
    10,
    2
);


/* =========================================================
   SERVICE ARTICLE HELPERS
========================================================= */

function ya_service_article_map() {
    return [
        'support' => [
            'slugs' => [
                'support-informatique',
                'support-it',
                'assistance-informatique',
            ],
            'titles' => [
                'Support informatique',
                'Support IT',
            ],
            'image' => 'https://yamaahmadi.fr/wp-content/uploads/2026/07/Support-Informatique.png',
            'gallery' => [
                'https://yamaahmadi.fr/wp-content/uploads/2026/07/Support-Informatique.png',
                'https://yamaahmadi.fr/wp-content/uploads/2026/07/Support-Informatique-1.png',
                'https://yamaahmadi.fr/wp-content/uploads/2026/07/Support-Informatique-2.png',
            ],
        ],

        'network' => [
            'slugs' => [
                'reseaux-wi-fi',
                'reseaux-wifi',
                'reseau-wifi',
                'network-wifi',
            ],
            'titles' => [
                'Réseaux & Wi-Fi',
                'Réseaux Wi-Fi',
                'Réseau Wi-Fi',
            ],
            'image' => 'https://yamaahmadi.fr/wp-content/uploads/2026/07/Reseaux-Wi-Fi.png',
            'gallery' => [
                'https://yamaahmadi.fr/wp-content/uploads/2026/07/Reseaux-Wi-Fi.png',
                'https://yamaahmadi.fr/wp-content/uploads/2026/07/Reseaux-Wi-Fi-1.png',
                'https://yamaahmadi.fr/wp-content/uploads/2026/07/Reseaux-Wi-Fi-2.png',
            ],
        ],

        'security' => [
            'slugs' => [
                'cybersecurite',
                'securite-informatique',
                'cybersecurity',
            ],
            'titles' => [
                'Cybersécurité',
                'Sécurité informatique',
            ],
            'image' => 'https://yamaahmadi.fr/wp-content/uploads/2026/07/cybersecurite-2.png',
            'gallery' => [
                'https://yamaahmadi.fr/wp-content/uploads/2026/07/cybersecurite-2.png',
                'https://yamaahmadi.fr/wp-content/uploads/2026/07/cybersecurite-1.png',
                'https://yamaahmadi.fr/wp-content/uploads/2026/07/cybersecurite.png',
            ],
        ],

        'cloud' => [
            'slugs' => [
                'microsoft-365-cloud',
                'microsoft-365',
                'cloud-microsoft-365',
            ],
            'titles' => [
                'Microsoft 365 & Cloud',
                'Microsoft 365',
            ],
            'image' => 'https://yamaahmadi.fr/wp-content/uploads/2026/07/microsoft-365-1.png',
            'gallery' => [
                'https://yamaahmadi.fr/wp-content/uploads/2026/07/microsoft-365-1.png',
                'https://yamaahmadi.fr/wp-content/uploads/2026/07/microsoft-365.png',
            ],
        ],

        'infra' => [
            'slugs' => [
                'infrastructure-it',
                'infrastructure-informatique',
                'infrastructure',
            ],
            'titles' => [
                'Infrastructure IT',
                'Infrastructure informatique',
            ],
            'image' => 'https://yamaahmadi.fr/wp-content/uploads/2026/07/Infrastructure-IT.png',
            'gallery' => [
                'https://yamaahmadi.fr/wp-content/uploads/2026/07/Infrastructure-IT.png',
                'https://yamaahmadi.fr/wp-content/uploads/2026/07/Infrastructure-IT-2.png',
                'https://yamaahmadi.fr/wp-content/uploads/2026/07/Infrastructure-IT-1.png',
            ],
        ],

        'consult' => [
            'slugs' => [
                'conseil-accompagnement',
                'conseil-it',
                'audit-conseil-it',
            ],
            'titles' => [
                'Conseil & accompagnement',
                'Conseil IT',
            ],
            'image' => 'https://yamaahmadi.fr/wp-content/uploads/2026/07/Conseil-accompagnement.png',
            'gallery' => [
                'https://yamaahmadi.fr/wp-content/uploads/2026/07/Conseil-accompagnement.png',
                'https://yamaahmadi.fr/wp-content/uploads/2026/07/Conseil-accompagnement-2.png',
                'https://yamaahmadi.fr/wp-content/uploads/2026/07/Conseil-accompagnement-1.png',
            ],
        ],

        'rapid' => [
            'slugs' => [
                'assistance-rapide',
                'intervention-rapide',
            ],
            'titles' => [
                'Assistance rapide',
                'Intervention rapide',
            ],
            'image' => 'https://yamaahmadi.fr/wp-content/uploads/2026/07/assistant-rapid.png',
            'gallery' => [
                'https://yamaahmadi.fr/wp-content/uploads/2026/07/assistant-rapid.png',
                'https://yamaahmadi.fr/wp-content/uploads/2026/07/assistant-rapid-2.png',
                'https://yamaahmadi.fr/wp-content/uploads/2026/07/assistant-rapid-3.png',
                'https://yamaahmadi.fr/wp-content/uploads/2026/07/assitant-rapid-5.png',
                'https://yamaahmadi.fr/wp-content/uploads/2026/07/Assitant-rapid-4.png',
            ],
        ],

        'onsite' => [
            'slugs' => [
                'support-sur-site-2',
                'support-sur-site',
            ],
            'titles' => [
                'Support sur site',
            ],
            'image' => 'https://yamaahmadi.fr/wp-content/uploads/2026/07/On-site-support-1.png',
            'gallery' => [
                'https://yamaahmadi.fr/wp-content/uploads/2026/07/On-site-support-1.png',
                'https://yamaahmadi.fr/wp-content/uploads/2026/07/one-site-support-2.png',
                'https://yamaahmadi.fr/wp-content/uploads/2026/07/one-site-support-3.png',
            ],
        ],

        'custom' => [
            'slugs' => [
                'solutions-informatiques-personnalisees',
            ],
            'titles' => [
                'Solutions informatiques personnalisées',
            ],
            'image' => 'https://yamaahmadi.fr/wp-content/uploads/2026/07/Solutions-informatiques-personnalisees.png',
            'gallery' => [
                'https://yamaahmadi.fr/wp-content/uploads/2026/07/Solutions-informatiques-personnalisees.png',
                'https://yamaahmadi.fr/wp-content/uploads/2026/07/Solutions-informatiques-personnalisees-1.png',
                'https://yamaahmadi.fr/wp-content/uploads/2026/07/Solutions-informatiques-personnalisees-2.png',
            ],
        ],

        'reliable' => [
            'slugs' => [
                'support-fiable',
            ],
            'titles' => [
                'Support fiable',
            ],
            'image' => 'https://yamaahmadi.fr/wp-content/uploads/2026/07/Support-fiable.png',
            'gallery' => [
                'https://yamaahmadi.fr/wp-content/uploads/2026/07/Support-fiable.png',
                'https://yamaahmadi.fr/wp-content/uploads/2026/07/Support-fiable-1.png',
                'https://yamaahmadi.fr/wp-content/uploads/2026/07/Support-fiable-2.png',
            ],
        ],

        'reinforced' => [
            'slugs' => [
                'securite-renforcee',
            ],
            'titles' => [
                'Sécurité renforcée',
            ],
            'image' => 'https://yamaahmadi.fr/wp-content/uploads/2026/07/Securite-renforcee-2.png',
            'gallery' => [
                'https://yamaahmadi.fr/wp-content/uploads/2026/07/Securite-renforcee-2.png',
                'https://yamaahmadi.fr/wp-content/uploads/2026/07/Securite-renforcee-1.png',
                'https://yamaahmadi.fr/wp-content/uploads/2026/07/Securite-renforcee.png',
            ],
        ],

        'web' => [
            'slugs' => [
                'hebergement-web-developpement-de-sites-internet',
            ],
            'titles' => [
                'Hébergement web & développement de sites internet',
            ],
            'image' => 'https://yamaahmadi.fr/wp-content/uploads/2025/12/network-support.webp',
            'gallery' => [
                'https://yamaahmadi.fr/wp-content/uploads/2025/12/network-support.webp',
            ],
        ],
    ];
}


/*
 * Returns the preferred media-library image explicitly mapped to a service.
 */
function ya_service_mapped_image($service_key, $fallback = '') {

    $map = ya_service_article_map();
    $service_key = sanitize_key($service_key);

    if (
        isset($map[$service_key]['image']) &&
        $map[$service_key]['image']
    ) {
        return esc_url_raw($map[$service_key]['image']);
    }

    return $fallback;
}


/*
 * Returns all mapped gallery images for richer service/about layouts.
 */
function ya_service_gallery($service_key) {

    $map = ya_service_article_map();
    $service_key = sanitize_key($service_key);

    if (
        empty($map[$service_key]['gallery']) ||
        !is_array($map[$service_key]['gallery'])
    ) {
        return [];
    }

    return array_values(
        array_filter(
            array_map(
                'esc_url_raw',
                $map[$service_key]['gallery']
            )
        )
    );
}


function ya_find_service_article($service_key) {

    static $cache = [];

    $service_key = sanitize_key($service_key);

    if (isset($cache[$service_key])) {
        return $cache[$service_key];
    }

    $map = ya_service_article_map();

    if (!isset($map[$service_key])) {
        $cache[$service_key] = null;
        return null;
    }

    /*
     * 1. Prefer an exact published post slug.
     */
    foreach ($map[$service_key]['slugs'] as $slug) {

        $post = get_page_by_path(
            $slug,
            OBJECT,
            'post'
        );

        if (
            $post instanceof WP_Post &&
            'publish' === $post->post_status
        ) {
            $cache[$service_key] = $post;
            return $post;
        }
    }

    /*
     * 2. Try an exact published post title.
     */
    foreach ($map[$service_key]['titles'] as $title) {

        $query = new WP_Query([
            'post_type'              => 'post',
            'post_status'            => 'publish',
            'posts_per_page'         => 1,
            'title'                  => $title,
            'ignore_sticky_posts'    => true,
            'no_found_rows'          => true,
            'update_post_meta_cache' => false,
            'update_post_term_cache' => false,
        ]);

        if ($query->have_posts()) {
            $post = $query->posts[0];
            $cache[$service_key] = $post;
            return $post;
        }
    }

    /*
     * 3. Fall back to a targeted WordPress search.
     */
    $search = $map[$service_key]['titles'][0];

    $query = new WP_Query([
        'post_type'              => 'post',
        'post_status'            => 'publish',
        'posts_per_page'         => 1,
        's'                      => $search,
        'ignore_sticky_posts'    => true,
        'no_found_rows'          => true,
        'update_post_meta_cache' => false,
        'update_post_term_cache' => false,
    ]);

    if ($query->have_posts()) {
        $post = $query->posts[0];
        $cache[$service_key] = $post;
        return $post;
    }

    $cache[$service_key] = null;

    return null;
}


function ya_service_article_url($service_key) {

    $post = ya_find_service_article($service_key);

    if ($post instanceof WP_Post) {

        $url = get_permalink($post);

        if (
            in_array(
                ya_lang(),
                ['en', 'de'],
                true
            )
        ) {
            $url = add_query_arg(
                'lang',
                ya_lang(),
                $url
            );
        }

        return $url;
    }

    /*
     * Safe fallback to the matching section on the Services page.
     */
    return ya_page('services') . '#' . sanitize_key($service_key);
}


function ya_service_article_image(
    $service_key,
    $fallback = ''
) {

    $mapped = ya_service_mapped_image(
        $service_key,
        ''
    );

    if ($mapped) {
        return $mapped;
    }

    $post = ya_find_service_article($service_key);

    if ($post instanceof WP_Post) {

        /*
         * Featured image is preferred.
         */
        if (has_post_thumbnail($post)) {

            $image = get_the_post_thumbnail_url(
                $post,
                'large'
            );

            if ($image) {
                return $image;
            }
        }

        /*
         * If there is no featured image, use the first image
         * found in the article content.
         */
        if (
            !empty($post->post_content) &&
            preg_match(
                '/<img[^>]+src=["\']([^"\']+)["\']/i',
                $post->post_content,
                $match
            )
        ) {
            return esc_url_raw($match[1]);
        }
    }

    return $fallback;
}

/* =========================================================
   CUSTOMIZER
========================================================= */

function ya_contact_info_customize($wp_customize) {

    $wp_customize->add_section(
        'ya_company',
        [
            'title'    => 'Yama Ahmadi — Entreprise',
            'priority' => 30,
        ]
    );

    $fields = [
        'ya_phone' => [
            'Téléphone',
            '+33 7 84 20 31 50',
            'sanitize_text_field',
        ],
        'ya_email' => [
            'E-mail',
            'support@yamaahmadi.fr',
            'sanitize_email',
        ],
        'ya_location' => [
            'Zone d’intervention',
            'France',
            'sanitize_text_field',
        ],
        'ya_hours' => [
            'Horaires',
            'Lun – Ven : 08:00 – 18:00',
            'sanitize_text_field',
        ],
        'ya_linkedin' => [
            'LinkedIn URL',
            '',
            'esc_url_raw',
        ],
        'ya_facebook' => [
            'Facebook URL',
            '',
            'esc_url_raw',
        ],
        'ya_instagram' => [
            'Instagram URL',
            '',
            'esc_url_raw',
        ],
        'ya_youtube' => [
            'YouTube URL',
            '',
            'esc_url_raw',
        ],
    ];

    foreach ($fields as $id => $config) {
        $wp_customize->add_setting(
            $id,
            [
                'default'           => $config[1],
                'sanitize_callback' => $config[2],
            ]
        );

        $wp_customize->add_control(
            $id,
            [
                'section' => 'ya_company',
                'label'   => $config[0],
                'type'    => 'text',
            ]
        );
    }
}
add_action('customize_register', 'ya_contact_info_customize');


/* =========================================================
   CREATE REQUIRED PAGES
========================================================= */

function ya_create_pages() {

    $pages = [
        'a-propos'                     => 'À propos',
        'services'                     => 'Services',
        'solutions'                    => 'Solutions',
        'projets'                      => 'Projets',
        'contact'                      => 'Contact',
        'demander-un-devis'            => 'Demander un devis',
        'mentions-legales'             => 'Mentions légales',
        'politique-de-confidentialite' => 'Politique de confidentialité',
        'politique-de-cookies'         => 'Politique de cookies',
        'conditions-utilisation'       => 'Conditions d’utilisation',
    ];

    foreach ($pages as $slug => $title) {
        if (!get_page_by_path($slug)) {
            wp_insert_post(
                [
                    'post_type'    => 'page',
                    'post_status'  => 'publish',
                    'post_title'   => $title,
                    'post_name'    => $slug,
                    'post_content' => '',
                ]
            );
        }
    }
}
add_action('after_switch_theme', 'ya_create_pages');


/* =========================================================
   PWA — MANIFEST + SERVICE WORKER
========================================================= */

function ya_pwa_rewrites() {

    add_rewrite_rule(
        '^manifest\.webmanifest$',
        'index.php?ya_manifest=1',
        'top'
    );

    add_rewrite_rule(
        '^service-worker\.js$',
        'index.php?ya_sw=1',
        'top'
    );
}
add_action('init', 'ya_pwa_rewrites');

function ya_pwa_query_vars($vars) {
    $vars[] = 'ya_manifest';
    $vars[] = 'ya_sw';
    return $vars;
}
add_filter('query_vars', 'ya_pwa_query_vars');

function ya_pwa_output() {

    if (get_query_var('ya_manifest')) {
        nocache_headers();
        header('Content-Type: application/manifest+json; charset=utf-8');

        $manifest = [
            'id'               => home_url('/'),
            'name'             => 'Yama Ahmadi IT Support & Services',
            'short_name'       => 'Yama Ahmadi',
            'description'      => 'Support informatique, réseaux, cybersécurité, Microsoft 365, cloud et interventions terrain en France.',
            'start_url'        => home_url('/'),
            'scope'            => home_url('/'),
            'display'          => 'standalone',
            'orientation'      => 'any',
            'background_color' => '#041419',
            'theme_color'      => '#041419',
            'icons'            => [
                [
                    'src'     => get_template_directory_uri() . '/assets/img/app-icon-192.png',
                    'sizes'   => '192x192',
                    'type'    => 'image/png',
                    'purpose' => 'any maskable',
                ],
                [
                    'src'     => get_template_directory_uri() . '/assets/img/app-icon-512.png',
                    'sizes'   => '512x512',
                    'type'    => 'image/png',
                    'purpose' => 'any maskable',
                ],
            ],
        ];

        echo wp_json_encode(
            $manifest,
            JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
        );

        exit;
    }

    if (get_query_var('ya_sw')) {
        nocache_headers();
        header('Content-Type: application/javascript; charset=utf-8');
        header('Service-Worker-Allowed: /');

        $home = home_url('/');
        $css  = get_template_directory_uri() . '/assets/css/main.css';
        $js   = get_template_directory_uri() . '/assets/js/main.js';
        ?>
const CACHE_NAME = 'yama-ahmadi-v2-6';

const STATIC_ASSETS = [
    <?php echo wp_json_encode($home); ?>,
    <?php echo wp_json_encode($css); ?>,
    <?php echo wp_json_encode($js); ?>
];

self.addEventListener('install', event => {
    self.skipWaiting();

    event.waitUntil(
        caches
            .open(CACHE_NAME)
            .then(cache => cache.addAll(STATIC_ASSETS))
            .catch(() => {})
    );
});

self.addEventListener('activate', event => {
    event.waitUntil(
        caches
            .keys()
            .then(keys =>
                Promise.all(
                    keys
                        .filter(key => key !== CACHE_NAME)
                        .map(key => caches.delete(key))
                )
            )
            .then(() => self.clients.claim())
    );
});

self.addEventListener('fetch', event => {

    const request = event.request;

    if (request.method !== 'GET') {
        return;
    }

    const url = new URL(request.url);

    if (url.origin !== self.location.origin) {
        return;
    }

    if (
        url.pathname.includes('/wp-admin') ||
        url.pathname.includes('/wp-login') ||
        url.pathname.includes('/wp-json') ||
        url.pathname.includes('/xmlrpc.php') ||
        url.searchParams.has('preview')
    ) {
        return;
    }

    if (request.mode === 'navigate') {
        event.respondWith(
            fetch(request)
                .then(response => {
                    if (response && response.ok) {
                        const copy = response.clone();

                        caches
                            .open(CACHE_NAME)
                            .then(cache => cache.put(request, copy));
                    }

                    return response;
                })
                .catch(() =>
                    caches
                        .match(request)
                        .then(
                            response =>
                                response ||
                                caches.match(
                                    <?php echo wp_json_encode($home); ?>
                                )
                        )
                )
        );

        return;
    }

    if (
        url.pathname.match(
            /\.(?:css|js|png|jpg|jpeg|webp|svg|ico|woff2?)$/i
        )
    ) {
        event.respondWith(
            caches
                .match(request)
                .then(cached => {
                    if (cached) {
                        return cached;
                    }

                    return fetch(request)
                        .then(response => {
                            if (response && response.ok) {
                                const copy = response.clone();

                                caches
                                    .open(CACHE_NAME)
                                    .then(
                                        cache =>
                                            cache.put(
                                                request,
                                                copy
                                            )
                                    );
                            }

                            return response;
                        });
                })
        );
    }
});
        <?php
        exit;
    }
}
add_action('template_redirect', 'ya_pwa_output', 0);

function ya_pwa_head() {
    ?>
    <link
        rel="manifest"
        href="<?php echo esc_url(home_url('/manifest.webmanifest')); ?>"
    >
    <meta name="theme-color" content="#041419">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta
        name="apple-mobile-web-app-status-bar-style"
        content="black-translucent"
    >
    <meta
        name="apple-mobile-web-app-title"
        content="Yama Ahmadi"
    >
    <link
        rel="apple-touch-icon"
        href="<?php echo esc_url(
            get_template_directory_uri() .
            '/assets/img/app-icon-192.png'
        ); ?>"
    >
    <?php
}
add_action('wp_head', 'ya_pwa_head', 2);

function ya_theme_activation() {
    ya_pwa_rewrites();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'ya_theme_activation');




/* =========================================================
   GITHUB THEME UPDATER
   Repository: yaahmadi/yama-ahmadi-pro-theme
========================================================= */

function ya_github_repo() {
    return [
        'owner' => 'yaahmadi',
        'repo'  => 'yama-ahmadi-pro-theme',
    ];
}

function ya_github_release_cache_key() {
    return 'ya_github_theme_release_v2';
}

function ya_github_api_headers() {
    $headers = [
        'Accept'               => 'application/vnd.github+json',
        'X-GitHub-Api-Version' => '2022-11-28',
        'User-Agent'           => 'Yama-Ahmadi-Pro-WordPress-Theme',
    ];

    if (defined('YA_GITHUB_TOKEN') && YA_GITHUB_TOKEN) {
        $headers['Authorization'] = 'Bearer ' . trim(YA_GITHUB_TOKEN);
    }

    return $headers;
}

function ya_github_set_status($status, $message = '', $release = null) {
    update_option(
        'ya_github_updater_status',
        [
            'status'       => sanitize_key($status),
            'message'      => sanitize_text_field($message),
            'checked_at'   => current_time('mysql'),
            'checked_time' => time(),
            'release'      => is_array($release)
                ? [
                    'version'   => sanitize_text_field($release['version'] ?? ''),
                    'tag'       => sanitize_text_field($release['tag'] ?? ''),
                    'published' => sanitize_text_field($release['published'] ?? ''),
                    'html_url'  => esc_url_raw($release['html_url'] ?? ''),
                ]
                : [],
        ],
        false
    );
}

function ya_github_get_status() {
    $status = get_option('ya_github_updater_status', []);
    return is_array($status) ? $status : [];
}

function ya_github_clear_release_cache() {
    delete_transient(ya_github_release_cache_key());
    delete_transient('ya_github_theme_release_v1');
    delete_site_transient('update_themes');
}

function ya_github_latest_release($force = false) {
    $cache_key = ya_github_release_cache_key();

    if (!$force) {
        $cached = get_transient($cache_key);

        if (is_array($cached) && !empty($cached['version'])) {
            return $cached;
        }
    }

    $repo = ya_github_repo();

    $endpoint = sprintf(
        'https://api.github.com/repos/%s/%s/releases/latest',
        rawurlencode($repo['owner']),
        rawurlencode($repo['repo'])
    );

    $response = wp_remote_get(
        $endpoint,
        [
            'timeout'     => 20,
            'redirection' => 5,
            'headers'     => ya_github_api_headers(),
        ]
    );

    if (is_wp_error($response)) {
        ya_github_set_status('error', $response->get_error_message());
        return null;
    }

    $status_code = (int) wp_remote_retrieve_response_code($response);

    if (200 !== $status_code) {
        $body = json_decode(wp_remote_retrieve_body($response), true);

        $message = is_array($body) && !empty($body['message'])
            ? (string) $body['message']
            : 'GitHub API HTTP ' . $status_code;

        ya_github_set_status('error', $message);
        return null;
    }

    $data = json_decode(wp_remote_retrieve_body($response), true);

    if (
        !is_array($data) ||
        empty($data['tag_name']) ||
        empty($data['zipball_url'])
    ) {
        ya_github_set_status('error', 'Réponse GitHub invalide ou incomplète.');
        return null;
    }

    $release = [
        'version'     => ltrim((string) $data['tag_name'], "vV"),
        'tag'         => (string) $data['tag_name'],
        'name'        => !empty($data['name']) ? (string) $data['name'] : (string) $data['tag_name'],
        'body'        => !empty($data['body']) ? (string) $data['body'] : '',
        'published'   => !empty($data['published_at']) ? (string) $data['published_at'] : '',
        'html_url'    => !empty($data['html_url']) ? (string) $data['html_url'] : '',
        'package_url' => (string) $data['zipball_url'],
    ];

    set_transient($cache_key, $release, 5 * MINUTE_IN_SECONDS);
    ya_github_set_status('success', 'Connexion GitHub réussie.', $release);

    return $release;
}

function ya_github_theme_update_transient($transient) {
    if (!is_object($transient)) {
        $transient = new stdClass();
    }

    if (!isset($transient->response)) {
        $transient->response = [];
    }

    if (!isset($transient->no_update)) {
        $transient->no_update = [];
    }

    $theme = wp_get_theme();

    if (!$theme->exists()) {
        return $transient;
    }

    $stylesheet      = get_stylesheet();
    $current_version = $theme->get('Version');
    $release         = ya_github_latest_release();

    if (!$release || empty($release['version']) || empty($release['package_url'])) {
        return $transient;
    }

    $update_data = [
        'theme'        => $stylesheet,
        'new_version'  => $release['version'],
        'url'          => $release['html_url'],
        'package'      => $release['package_url'],
        'requires'     => $theme->get('RequiresWP'),
        'requires_php' => $theme->get('RequiresPHP'),
    ];

    if (version_compare($release['version'], $current_version, '>')) {
        $transient->response[$stylesheet] = $update_data;
        unset($transient->no_update[$stylesheet]);
    } else {
        $transient->no_update[$stylesheet] = $update_data;
        unset($transient->response[$stylesheet]);
    }

    return $transient;
}
add_filter('pre_set_site_transient_update_themes', 'ya_github_theme_update_transient');

function ya_github_theme_api($result, $action, $args) {
    if (
        'theme_information' !== $action ||
        empty($args->slug) ||
        $args->slug !== get_stylesheet()
    ) {
        return $result;
    }

    $release = ya_github_latest_release();

    if (!$release) {
        return $result;
    }

    $theme = wp_get_theme();

    return (object) [
        'name'          => $theme->get('Name'),
        'slug'          => get_stylesheet(),
        'version'       => $release['version'],
        'author'        => $theme->get('Author'),
        'homepage'      => $theme->get('ThemeURI'),
        'requires'      => $theme->get('RequiresWP'),
        'requires_php'  => $theme->get('RequiresPHP'),
        'download_link' => $release['package_url'],
        'sections'      => [
            'description' => wpautop(esc_html($theme->get('Description'))),
            'changelog'   => wpautop(esc_html($release['body'] ?: 'Mise à jour du thème Yama Ahmadi Pro.')),
        ],
    ];
}
add_filter('themes_api', 'ya_github_theme_api', 10, 3);

function ya_github_upgrader_source_check($source, $remote_source, $upgrader, $hook_extra) {
    if (
        empty($hook_extra['theme']) ||
        $hook_extra['theme'] !== get_stylesheet()
    ) {
        return $source;
    }

    if (file_exists(trailingslashit($source) . 'style.css')) {
        return $source;
    }

    $folders = glob(trailingslashit($source) . '*', GLOB_ONLYDIR);

    if (
        is_array($folders) &&
        1 === count($folders) &&
        file_exists(trailingslashit($folders[0]) . 'style.css')
    ) {
        return trailingslashit($folders[0]);
    }

    return $source;
}
add_filter('upgrader_source_selection', 'ya_github_upgrader_source_check', 10, 4);

function ya_clear_github_release_cache($upgrader, $hook_extra) {
    if (!empty($hook_extra['type']) && 'theme' === $hook_extra['type']) {
        ya_github_clear_release_cache();
    }
}
add_action('upgrader_process_complete', 'ya_clear_github_release_cache', 10, 2);

/* =========================================================
   GITHUB UPDATER ADMIN SCREEN
========================================================= */

function ya_github_updater_admin_menu() {
    add_theme_page(
        'Mises à jour GitHub',
        'Mises à jour GitHub',
        'update_themes',
        'ya-github-updater',
        'ya_github_updater_admin_page'
    );
}
add_action('admin_menu', 'ya_github_updater_admin_menu');

function ya_github_force_check_handler() {
    if (!current_user_can('update_themes')) {
        wp_die(esc_html__('Vous n’avez pas la permission.', 'yama-ahmadi-pro'));
    }

    check_admin_referer('ya_github_force_check');

    ya_github_clear_release_cache();
    $release = ya_github_latest_release(true);
    wp_update_themes();

    $redirect = add_query_arg(
        [
            'page'       => 'ya-github-updater',
            'ya_checked' => $release ? '1' : '0',
        ],
        admin_url('themes.php')
    );

    wp_safe_redirect($redirect);
    exit;
}
add_action('admin_post_ya_github_force_check', 'ya_github_force_check_handler');

function ya_github_updater_admin_page() {
    if (!current_user_can('update_themes')) {
        return;
    }

    $theme             = wp_get_theme();
    $installed_version = $theme->get('Version');
    $release           = ya_github_latest_release();
    $status            = ya_github_get_status();

    $latest_version = !empty($release['version'])
        ? $release['version']
        : (!empty($status['release']['version']) ? $status['release']['version'] : 'Indisponible');

    $update_available =
        is_array($release) &&
        !empty($release['version']) &&
        version_compare($release['version'], $installed_version, '>');
    ?>
    <div class="wrap">
        <h1>Mises à jour GitHub — Yama Ahmadi Pro</h1>

        <?php if (isset($_GET['ya_checked'])) : ?>
            <?php if ('1' === sanitize_key($_GET['ya_checked'])) : ?>
                <div class="notice notice-success is-dismissible"><p>Vérification GitHub terminée.</p></div>
            <?php else : ?>
                <div class="notice notice-error is-dismissible"><p>La vérification GitHub a échoué.</p></div>
            <?php endif; ?>
        <?php endif; ?>

        <table class="widefat striped" style="max-width:760px;margin-top:20px">
            <tbody>
                <tr>
                    <th style="width:260px">Version installée</th>
                    <td><strong><?php echo esc_html($installed_version); ?></strong></td>
                </tr>
                <tr>
                    <th>Dernière version GitHub</th>
                    <td><strong><?php echo esc_html($latest_version); ?></strong></td>
                </tr>
                <tr>
                    <th>État</th>
                    <td>
                        <?php if ($update_available) : ?>
                            <span style="color:#b32d2e;font-weight:700">Mise à jour disponible</span>
                        <?php else : ?>
                            <span style="color:#008a20;font-weight:700">À jour ou aucune version plus récente</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th>Dernière vérification</th>
                    <td><?php echo !empty($status['checked_at']) ? esc_html($status['checked_at']) : 'Jamais'; ?></td>
                </tr>
                <tr>
                    <th>Message GitHub</th>
                    <td><?php echo !empty($status['message']) ? esc_html($status['message']) : 'Aucun message'; ?></td>
                </tr>
            </tbody>
        </table>

        <p style="margin-top:20px">
            <a
                class="button button-primary"
                href="<?php echo esc_url(wp_nonce_url(
                    admin_url('admin-post.php?action=ya_github_force_check'),
                    'ya_github_force_check'
                )); ?>"
            >
                Forcer la vérification GitHub
            </a>

            <a class="button" href="<?php echo esc_url(admin_url('update-core.php')); ?>">
                Ouvrir les mises à jour WordPress
            </a>
        </p>

        <p class="description">
            Les résultats GitHub sont mis en cache pendant cinq minutes.
            Ce bouton efface immédiatement le cache et relance la détection.
        </p>
    </div>
    <?php
}

function ya_github_refresh_on_update_screen() {
    if (!is_admin() || !current_user_can('update_themes')) {
        return;
    }

    global $pagenow;

    if ('update-core.php' === $pagenow && isset($_GET['force-check'])) {
        ya_github_clear_release_cache();
    }
}
add_action('admin_init', 'ya_github_refresh_on_update_screen');


/* =========================================================
   BODY CLASSES
========================================================= */

function ya_body_classes($classes) {
    $classes[] = 'ya-lang-' . ya_lang();
    return $classes;
}
add_filter('body_class', 'ya_body_classes');


/* =========================================================
   FALLBACK PAGE CONTENT
========================================================= */

function ya_fallback_page($slug) {

    ob_start();

    if ($slug === 'services') {
        ?>
        <div class="ya-section-head">
            <h2><?php echo esc_html(ya_t('services_title')); ?></h2>
            <p><?php echo esc_html(ya_t('services_intro')); ?></p>
        </div>

        <div class="ya-services">
            <?php
            $services = [
                ['support', 'Support informatique', 'Assistance sur site et à distance pour postes, logiciels, imprimantes et incidents.'],
                ['network', 'Réseaux & Wi‑Fi', 'Wi‑Fi, switches, routeurs, VLAN, pare-feu et connectivité sécurisée.'],
                ['security', 'Cybersécurité', 'Protection des postes, comptes, accès, sauvegardes et réseaux.'],
                ['cloud', 'Microsoft 365 & Cloud', 'Exchange, Teams, OneDrive, SharePoint, migrations et gestion des comptes.'],
                ['infra', 'Infrastructure IT', 'Déploiement, maintenance, postes, serveurs, inventaire et périphériques.'],
                ['consult', 'Conseil IT', 'Audit, recommandations, optimisation et accompagnement technique.'],
            ];

            foreach ($services as $service) :
                ?>
                <article
                    id="<?php echo esc_attr($service[0]); ?>"
                    class="ya-service"
                >
                    <h3><?php echo esc_html($service[1]); ?></h3>
                    <p><?php echo esc_html($service[2]); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
        <?php
    } elseif ($slug === 'a-propos') {
        ?>
        <h2>Yama Ahmadi Services Informatiques</h2>
        <p>
            Nous accompagnons les entreprises et professionnels
            avec des services de support informatique, réseau,
            cybersécurité, Microsoft 365, cloud, maintenance
            et assistance terrain.
        </p>
        <h3>Une approche orientée résultat</h3>
        <p>
            Chaque mission commence par l’analyse du besoin,
            suivie d’une proposition claire, d’une intervention
            structurée et d’une validation technique.
        </p>
        <?php
    } elseif ($slug === 'solutions') {
        ?>
        <h2>Solutions professionnelles</h2>
        <div class="ya-services">
            <article class="ya-service">
                <h3>Environnement de travail moderne</h3>
                <p>
                    Microsoft 365, Teams, OneDrive, identité,
                    sécurité et mobilité.
                </p>
            </article>
            <article class="ya-service">
                <h3>Réseau sécurisé</h3>
                <p>
                    Wi‑Fi professionnel, segmentation,
                    firewall, VPN et optimisation réseau.
                </p>
            </article>
            <article class="ya-service">
                <h3>Opérations IT</h3>
                <p>
                    Support utilisateurs, postes,
                    déploiements, maintenance et documentation.
                </p>
            </article>
        </div>
        <?php
    } elseif ($slug === 'projets') {
        ?>
        <h2>Expériences & interventions</h2>
        <p>
            Interventions de support, déploiement, réseau
            et infrastructure réalisées dans différents
            environnements professionnels et industriels en France.
        </p>
        <?php
    } elseif (
        $slug === 'contact' ||
        $slug === 'demander-un-devis'
    ) {
        ?>
        <div class="ya-contact-grid">
            <div>
                <h2><?php echo esc_html(ya_t('contact')); ?></h2>

                <p>
                    <strong>Téléphone</strong><br>
                    <?php echo esc_html(
                        get_theme_mod(
                            'ya_phone',
                            '+33 7 84 20 31 50'
                        )
                    ); ?>
                </p>

                <p>
                    <strong>E-mail</strong><br>
                    <?php echo esc_html(
                        get_theme_mod(
                            'ya_email',
                            'support@yamaahmadi.fr'
                        )
                    ); ?>
                </p>

                <p>
                    <strong><?php echo esc_html(ya_t('location')); ?></strong><br>
                    <?php echo esc_html(
                        get_theme_mod(
                            'ya_location',
                            'France'
                        )
                    ); ?>
                </p>
            </div>

            <div class="ya-form-placeholder">
                <h3><?php echo esc_html(ya_t('quote')); ?></h3>
                <p>
                    Ajoutez ici votre formulaire WordPress préféré.
                </p>
                <?php echo do_shortcode('[fluentform id="1"]'); ?>
            </div>
        </div>
        <?php
    } elseif (
        strpos($slug, 'confidentialite') !== false
    ) {
        ?>
        <h2>Politique de confidentialité</h2>
        <p>
            Les données transmises via les formulaires sont
            utilisées uniquement pour répondre aux demandes
            et fournir les services sollicités.
        </p>
        <?php
    } elseif (
        strpos($slug, 'cookies') !== false
    ) {
        ?>
        <h2>Politique de cookies</h2>
        <p>
            Le site peut utiliser des cookies nécessaires au
            fonctionnement ainsi que, selon votre configuration,
            des outils de mesure d’audience ou services tiers.
        </p>
        <?php
    } elseif ($slug === 'mentions-legales') {
        ?>
        <h2>Mentions légales</h2>
        <p>
            Éditeur : Yama Ahmadi Services Informatiques<br>
            Site : yamaahmadi.fr<br>
            E-mail :
            <?php echo esc_html(
                get_theme_mod(
                    'ya_email',
                    'support@yamaahmadi.fr'
                )
            ); ?><br>
            Téléphone :
            <?php echo esc_html(
                get_theme_mod(
                    'ya_phone',
                    '+33 7 84 20 31 50'
                )
            ); ?>
        </p>
        <?php
    } else {
        ?>
        <p>Contenu à compléter depuis l’éditeur WordPress.</p>
        <?php
    }

    return ob_get_clean();
}


/* =========================================================
   WORDPRESS FRONT-END CLEANUP
========================================================= */

remove_action('wp_head', 'wp_generator');

function ya_resource_hints(
    $urls,
    $relation_type
) {

    if ('preconnect' === $relation_type) {
        $urls[] = [
            'href'        => 'https://fonts.googleapis.com',
            'crossorigin' => 'anonymous',
        ];

        $urls[] = [
            'href'        => 'https://fonts.gstatic.com',
            'crossorigin' => 'anonymous',
        ];

        $urls[] = [
            'href'        => 'https://cdnjs.cloudflare.com',
            'crossorigin' => 'anonymous',
        ];
    }

    return $urls;
}
add_filter(
    'wp_resource_hints',
    'ya_resource_hints',
    10,
    2
);

function ya_nav_classes(
    $classes,
    $item
) {

    if (
        in_array(
            'current-menu-item',
            $classes,
            true
        )
    ) {
        $classes[] = 'ya-current-menu-item';
    }

    return $classes;
}
add_filter(
    'nav_menu_css_class',
    'ya_nav_classes',
    10,
    2
);
