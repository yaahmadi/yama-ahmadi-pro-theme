<?php
defined('ABSPATH') || exit;
$langs = ya_languages();
$lang  = ya_lang();
$li    = $langs[$lang] ?? $langs['fr'];
$phone = get_theme_mod('ya_phone', '+33 7 84 20 31 50');
$email = get_theme_mod('ya_email', 'support@yamaahmadi.fr');
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="ya-progress" aria-hidden="true"></div>
<div class="ya-topbar">
  <div class="ya-shell ya-topbar-in">
    <div class="ya-topbar-left">
      <a href="tel:<?php echo esc_attr(preg_replace('/\s+/', '', $phone)); ?>"><i class="fa-solid fa-phone"></i><span><?php echo esc_html($phone); ?></span></a>
      <a href="mailto:<?php echo esc_attr($email); ?>"><i class="fa-regular fa-envelope"></i><span><?php echo esc_html($email); ?></span></a>
    </div>
    <div class="ya-topbar-right">
      <button class="ya-top-action" data-ya-location type="button"><i class="fa-solid fa-location-dot"></i><span data-ya-location-label><?php echo esc_html(ya_t('france')); ?></span></button>
      <div class="ya-lang">
        <button class="ya-langbtn" type="button"><span><?php echo esc_html($li['flag'].' '.$li['short']); ?></span><i class="fa-solid fa-chevron-down"></i></button>
        <div class="ya-langmenu">
          <?php foreach ($langs as $code => $item): ?>
            <a href="<?php echo esc_url(ya_url_lang($code)); ?>"><span><?php echo esc_html($item['flag']); ?></span><?php echo esc_html($item['label']); ?></a>
          <?php endforeach; ?>
        </div>
      </div>
      <a class="ya-top-quote" href="<?php echo esc_url(ya_page('demander-un-devis')); ?>"><?php echo esc_html(ya_t('quote')); ?></a>
    </div>
  </div>
</div>
<header id="ya-header" class="ya-header">
  <div class="ya-shell ya-header-in">
    <a class="ya-brand" href="<?php echo esc_url(home_url('/')); ?>" aria-label="Yama Ahmadi IT Support & Services">
      <span class="ya-brand-mark" aria-hidden="true"><span></span><span></span><span></span></span>
      <span class="ya-brand-copy"><strong>YAMA AHMADI</strong><small>IT SUPPORT &amp; SERVICES</small></span>
    </a>
    <nav class="ya-nav" aria-label="Primary navigation">
      <?php if (has_nav_menu('primary')): ?>
        <?php wp_nav_menu(['theme_location'=>'primary','container'=>false,'menu_class'=>'ya-navlist','fallback_cb'=>false,'depth'=>1]); ?>
      <?php else: ?>
        <ul class="ya-navlist">
          <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html(ya_t('home')); ?></a></li>
          <li><a href="<?php echo esc_url(ya_page('a-propos')); ?>"><?php echo esc_html(ya_t('about')); ?></a></li>
          <li><a href="<?php echo esc_url(ya_page('services')); ?>"><?php echo esc_html(ya_t('services')); ?></a></li>
          <li><a href="<?php echo esc_url(ya_page('solutions')); ?>"><?php echo esc_html(ya_t('solutions')); ?></a></li>
          <li><a href="<?php echo esc_url(ya_page('projets')); ?>"><?php echo esc_html(ya_t('projects')); ?></a></li>
          <li><a href="<?php echo esc_url(get_option('page_for_posts') ? get_permalink(get_option('page_for_posts')) : home_url('/blog/')); ?>"><?php echo esc_html(ya_t('blog')); ?></a></li>
          <li><a href="<?php echo esc_url(ya_page('contact')); ?>"><?php echo esc_html(ya_t('contact')); ?></a></li>
        </ul>
      <?php endif; ?>
    </nav>
    <div class="ya-header-actions">
      <a class="ya-btn ya-btn-sm" href="<?php echo esc_url(ya_page('demander-un-devis')); ?>"><?php echo esc_html(ya_t('quote')); ?></a>
      <button class="ya-menu" type="button" aria-label="Open menu" aria-expanded="false"><span></span><span></span><span></span></button>
    </div>
  </div>
</header>
<div class="ya-mobile" aria-hidden="true">
  <div class="ya-mobile-panel">
    <div class="ya-mobile-head">
      <a class="ya-brand" href="<?php echo esc_url(home_url('/')); ?>"><span class="ya-brand-mark"><span></span><span></span><span></span></span><span class="ya-brand-copy"><strong>YAMA AHMADI</strong><small>IT SUPPORT &amp; SERVICES</small></span></a>
      <button class="ya-mobile-close" type="button" aria-label="Close menu">×</button>
    </div>
    <nav class="ya-mobile-nav">
      <a href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html(ya_t('home')); ?></a>
      <a href="<?php echo esc_url(ya_page('a-propos')); ?>"><?php echo esc_html(ya_t('about')); ?></a>
      <a href="<?php echo esc_url(ya_page('services')); ?>"><?php echo esc_html(ya_t('services')); ?></a>
      <a href="<?php echo esc_url(ya_page('solutions')); ?>"><?php echo esc_html(ya_t('solutions')); ?></a>
      <a href="<?php echo esc_url(ya_page('projets')); ?>"><?php echo esc_html(ya_t('projects')); ?></a>
      <a href="<?php echo esc_url(get_option('page_for_posts') ? get_permalink(get_option('page_for_posts')) : home_url('/blog/')); ?>"><?php echo esc_html(ya_t('blog')); ?></a>
      <a href="<?php echo esc_url(ya_page('contact')); ?>"><?php echo esc_html(ya_t('contact')); ?></a>
    </nav>
    <a class="ya-btn ya-mobile-quote" href="<?php echo esc_url(ya_page('demander-un-devis')); ?>"><?php echo esc_html(ya_t('quote')); ?></a>
    <div class="ya-mobile-meta">
      <a href="tel:<?php echo esc_attr(preg_replace('/\s+/', '', $phone)); ?>"><i class="fa-solid fa-phone"></i><?php echo esc_html($phone); ?></a>
      <a href="mailto:<?php echo esc_attr($email); ?>"><i class="fa-regular fa-envelope"></i><?php echo esc_html($email); ?></a>
    </div>
  </div>
</div>
<main id="content">
