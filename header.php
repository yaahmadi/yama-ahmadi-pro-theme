<?php
/**
 * Yama Ahmadi Pro — Final Header
 * WordPress menu is the single source of truth.
 */

defined('ABSPATH') || exit;

$langs = ya_languages();
$lang  = ya_lang();
$li    = $langs[$lang] ?? $langs['fr'];

$phone = get_theme_mod('ya_phone', '+33 7 84 20 31 50');
$email = get_theme_mod('ya_email', 'support@yamaahmadi.fr');

$quote_url = ya_page('demander-un-devis');

$home_url = function_exists('ya_home_url')
    ? ya_home_url()
    : home_url('/');

$brand_subtitle = [
    'fr' => 'SERVICES INFORMATIQUES',
    'en' => 'IT SUPPORT & SERVICES',
    'de' => 'IT-SUPPORT & SERVICES',
][$lang] ?? 'SERVICES INFORMATIQUES';
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta
        name="viewport"
        content="width=device-width,initial-scale=1,viewport-fit=cover"
    >
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="ya-progress" aria-hidden="true"></div>

<div id="ya-site-header" class="ya-site-header-shell">

    <div class="ya-topbar">
        <div class="ya-shell ya-topbar-in">

            <div class="ya-topbar-left">
                <a href="tel:<?php echo esc_attr(preg_replace('/\s+/', '', $phone)); ?>">
                    <i class="fa-solid fa-phone"></i>
                    <span><?php echo esc_html($phone); ?></span>
                </a>

                <a href="mailto:<?php echo esc_attr($email); ?>">
                    <i class="fa-regular fa-envelope"></i>
                    <span><?php echo esc_html($email); ?></span>
                </a>
            </div>

            <div class="ya-topbar-center">
                <span>
                    <i class="fa-solid fa-circle-check"></i>
                    <?php echo esc_html(
                        $lang === 'fr'
                            ? 'Support professionnel'
                            : ($lang === 'de' ? 'Professioneller Support' : 'Professional support')
                    ); ?>
                </span>

                <span>
                    <i class="fa-solid fa-location-dot"></i>
                    <?php echo esc_html(
                        $lang === 'fr'
                            ? 'Interventions en France'
                            : ($lang === 'de' ? 'Einsätze in Frankreich' : 'Services across France')
                    ); ?>
                </span>
            </div>

            <div class="ya-topbar-right">

                <button
                    class="ya-top-action"
                    data-ya-location
                    type="button"
                >
                    <i class="fa-solid fa-location-dot"></i>
                    <span data-ya-location-label>
                        <?php echo esc_html(ya_t('france')); ?>
                    </span>
                </button>

                <div class="ya-lang">

                    <button
                        class="ya-langbtn"
                        type="button"
                        aria-label="<?php echo esc_attr(ya_t('language')); ?>"
                        aria-haspopup="true"
                    >
                        <span class="ya-lang-current">
                            <b><?php echo esc_html($li['flag']); ?></b>
                            <?php echo esc_html($li['short']); ?>
                        </span>
                        <i class="fa-solid fa-chevron-down"></i>
                    </button>

                    <div class="ya-langmenu">
                        <?php foreach ($langs as $code => $item): ?>
                            <a
                                class="<?php echo $code === $lang ? 'active' : ''; ?>"
                                href="<?php echo esc_url(ya_url_lang($code)); ?>"
                            >
                                <span><?php echo esc_html($item['flag']); ?></span>
                                <strong><?php echo esc_html($item['label']); ?></strong>
                            </a>
                        <?php endforeach; ?>
                    </div>

                </div>

            </div>

        </div>
    </div>

    <header id="ya-header" class="ya-header">
        <div class="ya-shell ya-header-in">

            <a
                class="ya-brand"
                href="<?php echo esc_url($home_url); ?>"
                aria-label="Yama Ahmadi"
            >
                <img
                    class="ya-header-logo"
                    src="https://yamaahmadi.fr/wp-content/uploads/2026/07/logo-transparent-e1783249337721.png"
                    alt="Yama Ahmadi IT Support & Services"
                    width="190"
                    height="55"
                >
            </a>

            <nav
                class="ya-nav"
                aria-label="<?php echo esc_attr(
                    $lang === 'fr'
                        ? 'Navigation principale'
                        : ($lang === 'de' ? 'Hauptnavigation' : 'Primary navigation')
                ); ?>"
            >
                <?php if (has_nav_menu('primary')): ?>

                    <?php
                    wp_nav_menu([
                        'theme_location' => 'primary',
                        'container'      => false,
                        'menu_class'     => 'ya-navlist',
                        'fallback_cb'    => false,
                        'depth'          => 1,
                    ]);
                    ?>

                <?php else: ?>

                    <ul class="ya-navlist">
                        <li><a href="<?php echo esc_url($home_url); ?>"><?php echo esc_html(ya_t('home')); ?></a></li>
                        <li><a href="<?php echo esc_url(ya_page('a-propos')); ?>"><?php echo esc_html(ya_t('about')); ?></a></li>
                        <li><a href="<?php echo esc_url(ya_page('services')); ?>"><?php echo esc_html(ya_t('services')); ?></a></li>
                        <li><a href="<?php echo esc_url(ya_page('solutions')); ?>"><?php echo esc_html(ya_t('solutions')); ?></a></li>
                        <li><a href="<?php echo esc_url(ya_page('contact')); ?>"><?php echo esc_html(ya_t('contact')); ?></a></li>
                    </ul>

                <?php endif; ?>
            </nav>

            <div class="ya-header-actions">

                <a
                    class="ya-header-contact"
                    href="<?php echo esc_url(ya_page('contact')); ?>"
                    aria-label="<?php echo esc_attr(ya_t('contact')); ?>"
                >
                    <i class="fa-regular fa-message"></i>
                </a>

                <a
                    class="ya-btn ya-btn-sm ya-header-quote"
                    href="<?php echo esc_url($quote_url); ?>"
                >
                    <?php echo esc_html(ya_t('quote')); ?>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>

                <button
                    class="ya-menu"
                    type="button"
                    aria-label="<?php echo esc_attr(
                        $lang === 'fr'
                            ? 'Ouvrir le menu'
                            : ($lang === 'de' ? 'Menü öffnen' : 'Open menu')
                    ); ?>"
                    aria-expanded="false"
                >
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

            </div>

        </div>
    </header>
</div>

<div class="ya-mobile" aria-hidden="true">
    <div class="ya-mobile-overlay"></div>

    <aside class="ya-mobile-panel">

        <div class="ya-mobile-head">

            <a class="ya-brand" href="<?php echo esc_url($home_url); ?>">
                <img
                    class="ya-header-logo"
                    src="https://yamaahmadi.fr/wp-content/uploads/2026/07/logo-transparent-e1783249337721.png"
                    alt="Yama Ahmadi IT Support & Services"
                    width="190"
                    height="55"
                >
            </a>

            <button
                class="ya-mobile-close"
                type="button"
                aria-label="<?php echo esc_attr(
                    $lang === 'fr'
                        ? 'Fermer le menu'
                        : ($lang === 'de' ? 'Menü schließen' : 'Close menu')
                ); ?>"
            >
                ×
            </button>

        </div>

        <div class="ya-mobile-tools">

            <button type="button" data-ya-location>
                <i class="fa-solid fa-location-dot"></i>
                <span data-ya-location-label>
                    <?php echo esc_html(ya_t('france')); ?>
                </span>
            </button>

            <div class="ya-mobile-lang">
                <?php foreach ($langs as $code => $item): ?>
                    <a
                        class="<?php echo $code === $lang ? 'active' : ''; ?>"
                        href="<?php echo esc_url(ya_url_lang($code)); ?>"
                    >
                        <?php echo esc_html($item['flag'] . ' ' . $item['short']); ?>
                    </a>
                <?php endforeach; ?>
            </div>

        </div>

        <nav
            class="ya-mobile-nav"
            aria-label="<?php echo esc_attr(
                $lang === 'fr'
                    ? 'Navigation mobile'
                    : ($lang === 'de' ? 'Mobile Navigation' : 'Mobile navigation')
            ); ?>"
        >

            <?php if (has_nav_menu('primary')): ?>

                <?php
                wp_nav_menu([
                    'theme_location' => 'primary',
                    'container'      => false,
                    'items_wrap'     => '%3$s',
                    'fallback_cb'    => false,
                    'depth'          => 1,
                ]);
                ?>

            <?php else: ?>

                <a href="<?php echo esc_url($home_url); ?>">
                    <span><?php echo esc_html(ya_t('home')); ?></span>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>

                <a href="<?php echo esc_url(ya_page('a-propos')); ?>">
                    <span><?php echo esc_html(ya_t('about')); ?></span>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>

                <a href="<?php echo esc_url(ya_page('services')); ?>">
                    <span><?php echo esc_html(ya_t('services')); ?></span>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>

                <a href="<?php echo esc_url(ya_page('solutions')); ?>">
                    <span><?php echo esc_html(ya_t('solutions')); ?></span>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>

                <a href="<?php echo esc_url(ya_page('contact')); ?>">
                    <span><?php echo esc_html(ya_t('contact')); ?></span>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>

            <?php endif; ?>

        </nav>

        <a
            class="ya-btn ya-mobile-quote"
            href="<?php echo esc_url($quote_url); ?>"
        >
            <?php echo esc_html(ya_t('quote')); ?>
            <i class="fa-solid fa-arrow-right"></i>
        </a>

        <div class="ya-mobile-meta">

            <a href="tel:<?php echo esc_attr(preg_replace('/\s+/', '', $phone)); ?>">
                <i class="fa-solid fa-phone"></i>
                <?php echo esc_html($phone); ?>
            </a>

            <a href="mailto:<?php echo esc_attr($email); ?>">
                <i class="fa-regular fa-envelope"></i>
                <?php echo esc_html($email); ?>
            </a>

        </div>

    </aside>
</div>

<main id="content">
