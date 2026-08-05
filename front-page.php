<?php
/**
 * Yama Ahmadi Pro — Premium Homepage
 * Phase 2
 */

defined('ABSPATH') || exit;

get_header();

$services_url = ya_page('services');
$quote_url    = ya_page('demander-un-devis');
$contact_url  = ya_page('contact');
$projects_url = ya_page('projets');
?>

<!-- =========================================================
     HERO
========================================================= -->
<section class="ya-hero ya-home-hero">

    <div class="ya-hero-mesh" aria-hidden="true"></div>

    <div class="ya-hero-orb ya-hero-orb-one" aria-hidden="true"></div>
    <div class="ya-hero-orb ya-hero-orb-two" aria-hidden="true"></div>

    <div class="ya-shell ya-hero-layout">

        <div class="ya-hero-copy reveal">

            <span class="ya-kicker">
                <?php echo esc_html(ya_t('hero_kicker')); ?>
            </span>

            <h1>
                <?php echo esc_html(ya_t('hero_title')); ?>
            </h1>

            <p>
                <?php echo esc_html(ya_t('hero_text')); ?>
            </p>

            <div class="ya-actions">
                <a class="ya-btn"
                   href="<?php echo esc_url($services_url); ?>">

                    <?php echo esc_html(ya_t('hero_cta')); ?>

                    <i class="fa-solid fa-arrow-right"></i>
                </a>

                <a class="ya-btn ya-btn-outline"
                   href="<?php echo esc_url($quote_url); ?>">

                    <?php echo esc_html(ya_t('hero_quote')); ?>
                </a>
            </div>

            <div class="ya-trust-row">

                <span>
                    <i class="fa-solid fa-bolt"></i>
                    <?php echo esc_html(ya_t('response')); ?>
                </span>

                <span>
                    <i class="fa-solid fa-certificate"></i>
                    <?php echo esc_html(ya_t('certified')); ?>
                </span>

                <span>
                    <i class="fa-solid fa-location-dot"></i>
                    <?php echo esc_html(ya_t('coverage')); ?>
                </span>

            </div>

        </div>


        <!-- HERO NETWORK VISUAL -->
        <div class="ya-network-visual reveal"
             data-ya-parallax>

            <div class="ya-network-glow"></div>

            <div class="ya-network-ring r1"></div>
            <div class="ya-network-ring r2"></div>
            <div class="ya-network-ring r3"></div>

            <div class="ya-network-core">

                <i class="fa-solid fa-cloud"></i>

                <small>
                    SECURE CLOUD
                </small>

            </div>

            <div class="ya-network-node n1">

                <i class="fa-solid fa-server"></i>

                <span>
                    Infrastructure
                </span>

            </div>

            <div class="ya-network-node n2">

                <i class="fa-solid fa-shield-halved"></i>

                <span>
                    Security
                </span>

            </div>

            <div class="ya-network-node n3">

                <i class="fa-solid fa-wifi"></i>

                <span>
                    Networks
                </span>

            </div>

            <div class="ya-network-node n4">

                <i class="fa-solid fa-laptop"></i>

                <span>
                    Support
                </span>

            </div>

            <svg
                viewBox="0 0 620 520"
                aria-hidden="true"
            >
                <path d="M120 270C205 140 400 115 505 260"/>
                <path d="M105 300C220 390 400 405 525 290"/>
                <path d="M310 90V440"/>
                <path d="M125 150L500 390"/>
                <path d="M505 145L120 390"/>
            </svg>

        </div>

    </div>


    <!-- HERO SERVICE STRIP -->
    <div class="ya-hero-bottom">

        <div class="ya-shell">

            <span>
                <i class="fa-brands fa-microsoft"></i>
                <strong>Microsoft 365</strong>
                Workplace
            </span>

            <span>
                <i class="fa-solid fa-wifi"></i>
                <strong>Networks</strong>
                & Wi-Fi
            </span>

            <span>
                <i class="fa-solid fa-shield-halved"></i>
                <strong>Cybersecurity</strong>
                Protection
            </span>

            <span>
                <i class="fa-solid fa-location-dot"></i>
                <strong>Field IT</strong>
                Across France
            </span>

        </div>

    </div>

</section>


<!-- =========================================================
     TRUST / CAPABILITY STRIP
========================================================= -->
<section class="ya-home-trust">

    <div class="ya-shell ya-home-trust-grid">

        <div class="ya-home-trust-item reveal">

            <i class="fa-solid fa-headset"></i>

            <div>
                <strong>
                    Support L1 / L2
                </strong>

                <span>
                    Sur site et à distance
                </span>
            </div>

        </div>


        <div class="ya-home-trust-item reveal">

            <i class="fa-solid fa-network-wired"></i>

            <div>
                <strong>
                    Network Engineering
                </strong>

                <span>
                    Wi-Fi, VLAN, switches et routage
                </span>
            </div>

        </div>


        <div class="ya-home-trust-item reveal">

            <i class="fa-solid fa-shield-halved"></i>

            <div>
                <strong>
                    Sécurité IT
                </strong>

                <span>
                    Comptes, postes et infrastructure
                </span>
            </div>

        </div>


        <div class="ya-home-trust-item reveal">

            <i class="fa-solid fa-location-crosshairs"></i>

            <div>
                <strong>
                    Field Services
                </strong>

                <span>
                    Interventions professionnelles en France
                </span>
            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     SERVICES
========================================================= -->
<section class="ya-section ya-services-section">

    <div class="ya-shell">

        <div class="ya-section-head reveal">

            <span class="ya-kicker">
                <?php echo esc_html(ya_t('services')); ?>
            </span>

            <h2>
                <?php echo esc_html(ya_t('services_title')); ?>
            </h2>

            <p>
                <?php echo esc_html(ya_t('services_intro')); ?>
            </p>

        </div>


        <div class="ya-card-grid ya-services-grid">

            <?php
            $services = [

                [
                    'headset',
                    'Support informatique',
                    'Assistance L1/L2 sur site et à distance, postes, logiciels, imprimantes et incidents utilisateurs.',
                    'support',
                    '01'
                ],

                [
                    'network-wired',
                    'Réseaux & Wi-Fi',
                    'Installation et optimisation Wi-Fi, switches, routeurs, VLAN, pare-feu et connectivité.',
                    'network',
                    '02'
                ],

                [
                    'shield-halved',
                    'Cybersécurité',
                    'Protection des postes, comptes, accès, sauvegardes et réseaux professionnels.',
                    'security',
                    '03'
                ],

                [
                    'cloud',
                    'Microsoft 365 & Cloud',
                    'Exchange, Teams, OneDrive, SharePoint, comptes, migrations et accompagnement cloud.',
                    'cloud',
                    '04'
                ],

                [
                    'server',
                    'Infrastructure IT',
                    'Déploiement, maintenance, périphériques, postes, serveurs et environnements professionnels.',
                    'infra',
                    '05'
                ],

                [
                    'lightbulb',
                    'Conseil & accompagnement',
                    'Audit, recommandations, choix de solutions et amélioration des performances IT.',
                    'consult',
                    '06'
                ]

            ];

            foreach ($services as $i => $service):
            ?>

                <article
                    class="ya-premium-card ya-home-service-card reveal"
                    style="--delay:<?php echo esc_attr($i * 55); ?>ms"
                >

                    <span class="ya-card-number">
                        <?php echo esc_html($service[4]); ?>
                    </span>

                    <div class="ya-card-icon">

                        <i class="fa-solid fa-<?php echo esc_attr($service[0]); ?>"></i>

                    </div>

                    <h3>
                        <?php echo esc_html($service[1]); ?>
                    </h3>

                    <p>
                        <?php echo esc_html($service[2]); ?>
                    </p>

                    <a href="<?php echo esc_url(
                        $services_url . '#' . $service[3]
                    ); ?>">

                        <?php echo esc_html(ya_t('readmore')); ?>

                        <i class="fa-solid fa-arrow-right"></i>

                    </a>

                </article>

            <?php endforeach; ?>

        </div>

    </div>

</section>


<!-- =========================================================
     WHY YAMA AHMADI
========================================================= -->
<section class="ya-dark-feature ya-home-why">

    <div class="ya-shell ya-split">

        <div class="reveal">

            <span class="ya-kicker">
                <?php echo esc_html(ya_t('why')); ?>
            </span>

            <h2>
                <?php echo esc_html(ya_t('why_title')); ?>
            </h2>

            <p>
                Une approche terrain, structurée et orientée résultat
                pour maintenir vos utilisateurs, vos équipements
                et votre infrastructure opérationnels.
            </p>

            <div class="ya-why-points">

                <span>
                    <i class="fa-solid fa-circle-check"></i>
                    Qualification claire avant intervention
                </span>

                <span>
                    <i class="fa-solid fa-circle-check"></i>
                    Communication pendant la mission
                </span>

                <span>
                    <i class="fa-solid fa-circle-check"></i>
                    Tests et validation avant clôture
                </span>

            </div>

            <div class="ya-actions">

                <a
                    class="ya-btn"
                    href="<?php echo esc_url($contact_url); ?>"
                >
                    <?php echo esc_html(ya_t('contact')); ?>
                </a>

                <a
                    class="ya-text-link"
                    href="<?php echo esc_url($projects_url); ?>"
                >

                    Voir les expériences

                    <i class="fa-solid fa-arrow-right"></i>

                </a>

            </div>

        </div>


        <div class="ya-stat-grid">

            <div class="reveal">

                <strong>
                    120+
                </strong>

                <span>
                    Interventions
                </span>

            </div>


            <div class="reveal">

                <strong>
                    6
                </strong>

                <span>
                    Domaines IT
                </span>

            </div>


            <div class="reveal">

                <strong>
                    L1/L2
                </strong>

                <span>
                    Support professionnel
                </span>

            </div>


            <div class="reveal">

                <strong>
                    FR
                </strong>

                <span>
                    Intervention terrain
                </span>

            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     TECHNOLOGIES
========================================================= -->
<section class="ya-section ya-technology-section">

    <div class="ya-shell">

        <div class="ya-section-head reveal">

            <span class="ya-kicker">
                TECHNOLOGIES & EXPERTISE
            </span>

            <h2>
                Des environnements techniques adaptés aux entreprises
            </h2>

            <p>
                Des technologies utilisées quotidiennement dans les
                environnements professionnels, intégrées dans une approche
                orientée stabilité, sécurité et exploitation.
            </p>

        </div>


        <div class="ya-tech-grid">

            <?php
            $technologies = [

                ['Microsoft 365', 'fa-brands fa-microsoft'],
                ['Azure', 'fa-solid fa-cloud'],
                ['Windows', 'fa-brands fa-windows'],
                ['Cisco', 'fa-solid fa-network-wired'],
                ['Fortinet', 'fa-solid fa-shield-halved'],
                ['VMware', 'fa-solid fa-server'],
                ['Ubiquiti', 'fa-solid fa-wifi'],
                ['Apple macOS', 'fa-brands fa-apple'],
                ['Linux', 'fa-brands fa-linux'],
                ['Dell', 'fa-solid fa-laptop'],
                ['HP', 'fa-solid fa-print'],
                ['Lenovo', 'fa-solid fa-computer']

            ];

            foreach ($technologies as $tech):
            ?>

                <div class="ya-tech-chip reveal">

                    <span class="ya-tech-icon">

                        <i class="<?php echo esc_attr($tech[1]); ?>"></i>

                    </span>

                    <span>
                        <?php echo esc_html($tech[0]); ?>
                    </span>

                </div>

            <?php endforeach; ?>

        </div>

    </div>

</section>


<!-- =========================================================
     PROFESSIONAL EXPERIENCE
========================================================= -->
<section class="ya-section ya-project-section">

    <div class="ya-shell">

        <div class="ya-section-head reveal">

            <span class="ya-kicker">
                RÉFÉRENCES PROFESSIONNELLES
            </span>

            <h2>
                Expérience dans des environnements IT exigeants
            </h2>

            <p>
                Missions terrain, support utilisateurs, infrastructure,
                déploiement et réseau réalisées dans différents
                environnements professionnels.
            </p>

        </div>


        <div class="ya-card-grid ya-project-grid">

            <?php
            $projects = [

                [
                    'Marelli',
                    'Châtellerault, France',
                    'Support informatique L1/L2, Microsoft 365, postes de travail et environnement industriel.',
                    'INDUSTRIAL IT'
                ],

                [
                    'Action Logistics',
                    'Angers, France',
                    'Assistance technique, support réseau, préparation de postes et accompagnement sur site.',
                    'LOGISTICS IT'
                ],

                [
                    'HCL Technologies',
                    'Enterprise IT',
                    'Support technique, résolution d’incidents et assistance utilisateurs.',
                    'ENTERPRISE'
                ],

                [
                    'TECEZE',
                    'Field IT Services',
                    'Interventions terrain, diagnostic, remplacement matériel et support infrastructure.',
                    'FIELD SERVICES'
                ],

                [
                    'Cognizant',
                    'Enterprise IT',
                    'Assistance utilisateurs, maintenance des postes et accompagnement technique.',
                    'ENTERPRISE'
                ],

                [
                    'Wipro',
                    'Professional IT',
                    'Support utilisateurs, gestion d’incidents et assistance technique.',
                    'PROFESSIONAL IT'
                ]

            ];

            foreach ($projects as $project):
            ?>

                <article class="ya-project-card ya-home-project-card reveal">

                    <div class="ya-project-top">

                        <span class="ya-mini-label">
                            <?php echo esc_html($project[3]); ?>
                        </span>

                        <span class="ya-project-arrow">

                            <i class="fa-solid fa-arrow-up-right"></i>

                        </span>

                    </div>

                    <h3>
                        <?php echo esc_html($project[0]); ?>
                    </h3>

                    <small>
                        <?php echo esc_html($project[1]); ?>
                    </small>

                    <p>
                        <?php echo esc_html($project[2]); ?>
                    </p>

                </article>

            <?php endforeach; ?>

        </div>


        <p class="ya-disclaimer">

            Les références ci-dessus représentent des expériences
            et missions professionnelles réalisées dans différents
            environnements IT. Elles ne constituent pas nécessairement
            une approbation officielle ou un partenariat commercial
            public avec les entreprises citées.

        </p>

    </div>

</section>


<!-- =========================================================
     PARTNER / EXPERIENCE MARQUEE
========================================================= -->
<section class="ya-partner-band">

    <div class="ya-shell">

        <div class="ya-partner-title reveal">

            <span class="ya-kicker">
                ENVIRONNEMENTS & TECHNOLOGIES
            </span>

            <p>
                Expérience au contact d’équipes, plateformes
                et environnements professionnels variés.
            </p>

        </div>

    </div>


    <div
        class="ya-marquee"
        aria-label="Professional environments"
    >

        <div class="ya-marquee-fade ya-marquee-fade-left"></div>
        <div class="ya-marquee-fade ya-marquee-fade-right"></div>

        <div class="ya-marquee-track">

            <?php
            $brands = [

                ['MARELLI', 'fa-solid fa-industry'],
                ['ACTION', 'fa-solid fa-boxes-stacked'],
                ['HCLTECH', 'fa-solid fa-microchip'],
                ['TECEZE', 'fa-solid fa-screwdriver-wrench'],
                ['COGNIZANT', 'fa-solid fa-building'],
                ['WIPRO', 'fa-solid fa-code'],
                ['MICROSOFT', 'fa-brands fa-microsoft'],
                ['CISCO', 'fa-solid fa-network-wired'],
                ['FORTINET', 'fa-solid fa-shield-halved'],
                ['UBIQUITI', 'fa-solid fa-wifi']

            ];

            for ($repeat = 0; $repeat < 2; $repeat++):

                foreach ($brands as $brand):
            ?>

                    <span class="ya-partner-logo">

                        <i class="<?php echo esc_attr($brand[1]); ?>"></i>

                        <strong>
                            <?php echo esc_html($brand[0]); ?>
                        </strong>

                    </span>

            <?php
                endforeach;

            endfor;
            ?>

        </div>

    </div>

</section>


<!-- =========================================================
     BLOG
========================================================= -->
<?php

$posts_query = new WP_Query([

    'post_type'      => 'post',
    'posts_per_page' => 3,
    'post_status'    => 'publish'

]);

if ($posts_query->have_posts()):
?>

<section class="ya-section ya-home-blog">

    <div class="ya-shell">

        <div class="ya-section-head reveal">

            <span class="ya-kicker">
                BLOG & INSIGHTS
            </span>

            <h2>
                <?php echo esc_html(ya_t('latest')); ?>
            </h2>

            <p>
                <?php echo esc_html(ya_t('latest_intro')); ?>
            </p>

        </div>


        <div class="ya-post-grid">

            <?php
            while ($posts_query->have_posts()):

                $posts_query->the_post();
            ?>

                <article class="ya-post-card reveal">

                    <?php if (has_post_thumbnail()): ?>

                        <a
                            class="ya-post-image"
                            href="<?php the_permalink(); ?>"
                        >

                            <?php the_post_thumbnail('large'); ?>

                            <span></span>

                        </a>

                    <?php endif; ?>


                    <div class="ya-post-body">

                        <small>
                            <?php echo esc_html(get_the_date()); ?>
                        </small>

                        <h3>

                            <a href="<?php the_permalink(); ?>">

                                <?php the_title(); ?>

                            </a>

                        </h3>

                        <p>
                            <?php
                            echo esc_html(
                                wp_trim_words(
                                    get_the_excerpt(),
                                    22
                                )
                            );
                            ?>
                        </p>

                        <a
                            class="ya-text-link"
                            href="<?php the_permalink(); ?>"
                        >

                            <?php echo esc_html(ya_t('readmore')); ?>

                            <i class="fa-solid fa-arrow-right"></i>

                        </a>

                    </div>

                </article>

            <?php endwhile; ?>

        </div>

    </div>

</section>

<?php

wp_reset_postdata();

endif;
?>


<!-- =========================================================
     FINAL CTA
========================================================= -->
<section class="ya-cta ya-home-final-cta">

    <div class="ya-shell ya-cta-in reveal">

        <div>

            <span class="ya-kicker">
                BESOIN D’ASSISTANCE ?
            </span>

            <h2>
                <?php echo esc_html(ya_t('cta_title')); ?>
            </h2>

            <p>
                <?php echo esc_html(ya_t('cta_text')); ?>
            </p>

        </div>

        <div class="ya-cta-actions">

            <a
                class="ya-btn"
                href="<?php echo esc_url($quote_url); ?>"
            >

                <?php echo esc_html(ya_t('quote')); ?>

                <i class="fa-solid fa-arrow-right"></i>

            </a>

            <a
                class="ya-btn ya-btn-outline"
                href="<?php echo esc_url($contact_url); ?>"
            >

                <?php echo esc_html(ya_t('contact')); ?>

            </a>

        </div>

    </div>

</section>


<?php get_footer(); ?>