<?php get_header(); while(have_posts()): the_post(); ?>
<section class="ya-inner-hero ya-inner-hero-compact"><div class="ya-inner-grid"></div><div class="ya-shell"><span class="ya-kicker"><?php echo esc_html(get_the_date()); ?> • INSIGHT</span><h1><?php the_title(); ?></h1></div></section>
<article class="ya-page"><div class="ya-shell ya-prose"><?php if(has_post_thumbnail()) the_post_thumbnail('full',['class'=>'ya-featured']); the_content(); ?></div></article>
<section class="ya-cta"><div class="ya-shell ya-cta-in reveal"><div><span class="ya-kicker">CONTACT</span><h2>Besoin d’aide sur votre environnement IT ?</h2><p>Transformons le sujet en prochaine action claire.</p></div><a class="ya-btn" href="<?php echo esc_url(ya_page('contact')); ?>"><?php echo esc_html(ya_t('contact')); ?></a></div></section>
<?php endwhile; get_footer(); ?>
