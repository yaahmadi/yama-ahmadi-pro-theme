<?php
defined('ABSPATH') || exit;

define('YA_VERSION', '2.6.0');

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
        ],
    ];
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
