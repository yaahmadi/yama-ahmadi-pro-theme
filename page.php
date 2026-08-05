<?php
/**
 * Yama Ahmadi Pro — Premium Inner Pages
 * Phase 3
 */

defined('ABSPATH') || exit;

get_header();

while (have_posts()) :
    the_post();

    $slug  = get_post_field('post_name');
    $title = get_the_title();

    $phone = get_theme_mod('ya_phone', '+33 7 84 20 31 50');
    $email = get_theme_mod('ya_email', 'support@yamaahmadi.fr');
    $hours = get_theme_mod('ya_hours', 'Lun – Ven : 08:00 – 18:00');
    $area  = get_theme_mod('ya_location', 'France');

    $premium_pages = [
        'a-propos',
        'services',
        'solutions',
        'projets',
        'contact',
        'demander-un-devis'
    ];

    $hero_map = [

        'a-propos' => [
            'À PROPOS',
            'Une expertise IT construite autour de la fiabilité.',
            'Support, réseau, cybersécurité, cloud et interventions terrain avec une approche claire, structurée et orientée résultat.',
            'fa-user-gear'
        ],

        'services' => [
            'SERVICES',
            'Des services IT complets pour maintenir votre entreprise opérationnelle.',
            'Du support utilisateur à l’infrastructure réseau, chaque intervention est préparée, exécutée et validée avec méthode.',
            'fa-layer-group'
        ],

        'solutions' => [
            'SOLUTIONS',
            'Des solutions IT conçues pour vos opérations quotidiennes.',
            'Environnement de travail moderne, réseaux sécurisés, infrastructure et services terrain adaptés aux besoins des entreprises modernes.',
            'fa-diagram-project'
        ],

        'projets' => [
            'EXPÉRIENCES',
            'Une expérience terrain dans des environnements IT exigeants.',
            'Support, infrastructure, réseau et déploiement réalisés dans différents environnements professionnels et industriels.',
            'fa-briefcase'
        ],

        'contact' => [
            'CONTACT',
            'Parlons de votre besoin informatique.',
            'Présentez votre environnement, votre incident ou votre projet afin de recevoir une réponse claire et adaptée.',
            'fa-comments'
        ],

        'demander-un-devis' => [
            'DEMANDE DE DEVIS',
            'Préparons votre intervention IT.',
            'Indiquez le contexte, le lieu, le périmètre et vos contraintes afin de faciliter une évaluation précise.',
            'fa-file-signature'
        ]

    ];

    if (in_array($slug, $premium_pages, true)) :

        $hero = $hero_map[$slug];
?>

<!-- =========================================================
     PREMIUM INNER HERO
========================================================= -->
<section class="ya-inner-hero ya-premium-inner-hero">

    <div class="ya-inner-grid" aria-hidden="true"></div>

    <div class="ya-inner-orb ya-inner-orb-one" aria-hidden="true"></div>
    <div class="ya-inner-orb ya-inner-orb-two" aria-hidden="true"></div>

    <div class="ya-shell ya-inner-hero-in">

        <div class="ya-inner-copy reveal">

            <span class="ya-kicker">
                <?php echo esc_html($hero[0]); ?>
            </span>

            <h1>
                <?php echo esc_html($hero[1]); ?>
            </h1>

            <p>
                <?php echo esc_html($hero[2]); ?>
            </p>

            <div class="ya-inner-badges">

                <span>
                    <i class="fa-solid fa-circle-check"></i>
                    Professionnel
                </span>

                <span>
                    <i class="fa-solid fa-location-dot"></i>
                    France
                </span>

                <span>
                    <i class="fa-solid fa-shield-halved"></i>
                    IT & sécurité
                </span>

            </div>

        </div>


        <div class="ya-inner-visual reveal">

            <div class="ya-inner-glow"></div>

            <div class="ya-inner-icon">

                <i class="fa-solid <?php echo esc_attr($hero[3]); ?>"></i>

            </div>

            <div class="ya-inner-orbit">

                <i class="fa-solid fa-wifi"></i>
                <i class="fa-solid fa-cloud"></i>
                <i class="fa-solid fa-server"></i>

            </div>

        </div>

    </div>

</section>


<?php if ($slug === 'services') : ?>

<!-- =========================================================
     SERVICES
========================================================= -->
<section class="ya-section ya-inner-services">

    <div class="ya-shell">

        <div class="ya-section-head reveal">

            <span class="ya-kicker">
                6 DOMAINES IT
            </span>

            <h2>
                Une couverture complète de vos besoins informatiques
            </h2>

            <p>
                Support, infrastructure, réseau, sécurité et cloud avec une
                méthodologie claire avant, pendant et après chaque intervention.
            </p>

        </div>


        <div class="ya-card-grid ya-services-grid">

            <?php
            $services = [

                [
                    'support',
                    'headset',
                    'Support informatique',
                    'Assistance L1/L2 sur site et à distance pour postes Windows/macOS, logiciels, périphériques et incidents utilisateurs.',
                    ['Support utilisateurs', 'Diagnostic incidents', 'Postes & logiciels']
                ],

                [
                    'network',
                    'network-wired',
                    'Réseaux & Wi-Fi',
                    'Installation, diagnostic et optimisation des infrastructures réseau professionnelles.',
                    ['Wi-Fi professionnel', 'Switches & VLAN', 'DNS & connectivité']
                ],

                [
                    'security',
                    'shield-halved',
                    'Cybersécurité',
                    'Protection des utilisateurs, postes, comptes, accès et infrastructures.',
                    ['Sécurisation comptes', 'Protection des postes', 'Bonnes pratiques']
                ],

                [
                    'cloud',
                    'cloud',
                    'Microsoft 365 & Cloud',
                    'Administration et accompagnement autour des outils Microsoft 365 et services cloud.',
                    ['Teams & OneDrive', 'Exchange', 'Comptes & migrations']
                ],

                [
                    'infra',
                    'server',
                    'Infrastructure IT',
                    'Déploiement, maintenance et support des équipements et infrastructures professionnelles.',
                    ['Postes & serveurs', 'Rack & périphériques', 'Déploiements']
                ],

                [
                    'consult',
                    'lightbulb',
                    'Conseil & accompagnement',
                    'Audit, recommandations et accompagnement pour améliorer la fiabilité de votre environnement IT.',
                    ['Audit', 'Recommandations', 'Optimisation']
                ]

            ];

            foreach ($services as $i => $service) :
            ?>

                <article
                    id="<?php echo esc_attr($service[0]); ?>"
                    class="ya-premium-card ya-service-detail reveal"
                    style="--delay:<?php echo esc_attr($i * 55); ?>ms"
                >

                    <span class="ya-card-number">
                        <?php echo esc_html(str_pad($i + 1, 2, '0', STR_PAD_LEFT)); ?>
                    </span>

                    <div class="ya-card-icon">

                        <i class="fa-solid fa-<?php echo esc_attr($service[1]); ?>"></i>

                    </div>

                    <h3>
                        <?php echo esc_html($service[2]); ?>
                    </h3>

                    <p>
                        <?php echo esc_html($service[3]); ?>
                    </p>

                    <ul>

                        <?php foreach ($service[4] as $item) : ?>

                            <li>
                                <?php echo esc_html($item); ?>
                            </li>

                        <?php endforeach; ?>

                    </ul>

                    <a class="ya-service-readmore" href="<?php echo esc_url(ya_page('contact')); ?>">

                        Parler de ce service

                        <i class="fa-solid fa-arrow-right"></i>

                    </a>

                </article>

            <?php endforeach; ?>

        </div>

    </div>

</section>


<!-- PROCESS -->
<section class="ya-dark-feature ya-process-section">

    <div class="ya-shell">

        <div class="ya-section-head ya-section-head-light reveal">

            <span class="ya-kicker">
                NOTRE MÉTHODE
            </span>

            <h2>
                Une intervention simple et structurée
            </h2>

            <p>
                Chaque mission suit un processus clair pour réduire les imprévus
                et garantir une meilleure qualité d’exécution.
            </p>

        </div>


        <div class="ya-process-grid">

            <?php
            $steps = [

                ['01', 'Qualification', 'Compréhension du besoin, du site, de l’urgence et des contraintes.'],

                ['02', 'Préparation', 'Planification, prérequis techniques et coordination avant intervention.'],

                ['03', 'Intervention', 'Exécution méthodique avec communication pendant la mission.'],

                ['04', 'Validation', 'Tests, compte rendu et recommandations avant clôture.']

            ];

            foreach ($steps as $step) :
            ?>

                <article class="ya-process-card reveal">

                    <b>
                        <?php echo esc_html($step[0]); ?>
                    </b>

                    <h3>
                        <?php echo esc_html($step[1]); ?>
                    </h3>

                    <p>
                        <?php echo esc_html($step[2]); ?>
                    </p>

                </article>

            <?php endforeach; ?>

        </div>

    </div>

</section>


<?php elseif ($slug === 'solutions') : ?>

<!-- =========================================================
     SOLUTIONS
========================================================= -->
<section class="ya-section ya-solutions-page">

    <div class="ya-shell">

        <div class="ya-section-head reveal">

            <span class="ya-kicker">
                SOLUTIONS PROFESSIONNELLES
            </span>

            <h2>
                Une infrastructure IT plus stable et mieux structurée
            </h2>

            <p>
                Des solutions organisées autour des besoins quotidiens des
                entreprises : utilisateurs, sécurité, réseau et exploitation.
            </p>

        </div>


        <div class="ya-solution-stack">

            <?php
            $solutions = [

                [
                    '01',
                    'Environnement de travail moderne',
                    'Microsoft 365, Teams, OneDrive, identités et collaboration pour un environnement utilisateur moderne.',
                    'fa-cloud',
                    'Microsoft 365 • Teams • OneDrive • Exchange'
                ],

                [
                    '02',
                    'Réseau sécurisé',
                    'Wi-Fi professionnel, segmentation réseau, firewall, VPN et optimisation de la connectivité.',
                    'fa-shield-halved',
                    'Wi-Fi • VLAN • Firewall • VPN'
                ],

                [
                    '03',
                    'Opérations IT',
                    'Support utilisateurs, maintenance des postes, déploiement et documentation technique.',
                    'fa-gears',
                    'L1/L2 • Équipements • Déploiement • Support'
                ],

                [
                    '04',
                    'Services terrain',
                    'Interventions terrain, remote hands, rack, remplacement matériel et support multi-sites.',
                    'fa-location-crosshairs',
                    'Sur site • Remote hands • Infrastructure'
                ]

            ];

            foreach ($solutions as $solution) :
            ?>

                <article class="ya-solution-row reveal">

                    <span class="ya-solution-index">
                        <?php echo esc_html($solution[0]); ?>
                    </span>

                    <div class="ya-solution-icon">

                        <i class="fa-solid <?php echo esc_attr($solution[3]); ?>"></i>

                    </div>

                    <div class="ya-solution-content">

                        <span class="ya-mini-label">
                            SOLUTION
                        </span>

                        <h2>
                            <?php echo esc_html($solution[1]); ?>
                        </h2>

                        <p>
                            <?php echo esc_html($solution[2]); ?>
                        </p>

                        <small>
                            <?php echo esc_html($solution[4]); ?>
                        </small>

                    </div>

                    <a
                        href="<?php echo esc_url(ya_page('contact')); ?>"
                        class="ya-circle-link"
                        aria-label="Contact"
                    >

                        <i class="fa-solid fa-arrow-right"></i>

                    </a>

                </article>

            <?php endforeach; ?>

        </div>

    </div>

</section>


<?php elseif ($slug === 'a-propos') : ?>

<!-- =========================================================
     ABOUT
========================================================= -->
<section class="ya-section ya-about-section">

    <div class="ya-shell ya-about-grid">

        <div class="ya-about-copy reveal">

            <span class="ya-kicker">
                NOTRE APPROCHE
            </span>

            <h2>
                Une prestation IT basée sur la clarté, la préparation et le résultat.
            </h2>

            <p>
                Yama Ahmadi Services Informatiques accompagne les entreprises
                avec des services de support, réseau, cybersécurité,
                Microsoft 365, infrastructure et interventions terrain.
            </p>

            <p>
                L’objectif est de comprendre rapidement le contexte,
                intervenir avec méthode, communiquer clairement et valider
                le résultat avant clôture.
            </p>

            <div class="ya-actions">

                <a
                    class="ya-btn"
                    href="<?php echo esc_url(ya_page('contact')); ?>"
                >
                    Parler de votre besoin
                </a>

            </div>

        </div>


        <div class="ya-value-grid">

            <?php
            $values = [

                [
                    'fa-bolt',
                    'Réactivité',
                    'Une communication rapide selon la disponibilité et le niveau d’urgence.'
                ],

                [
                    'fa-list-check',
                    'Méthode',
                    'Préparation, exécution, tests et validation avant clôture.'
                ],

                [
                    'fa-shield-halved',
                    'Fiabilité',
                    'Des actions orientées stabilité et réduction du risque.'
                ],

                [
                    'fa-language',
                    'Communication',
                    'Français, anglais et allemand pour faciliter les échanges avec des équipes internationales.'
                ]

            ];

            foreach ($values as $value) :
            ?>

                <article class="ya-value-card reveal">

                    <i class="fa-solid <?php echo esc_attr($value[0]); ?>"></i>

                    <h3>
                        <?php echo esc_html($value[1]); ?>
                    </h3>

                    <p>
                        <?php echo esc_html($value[2]); ?>
                    </p>

                </article>

            <?php endforeach; ?>

        </div>

    </div>

</section>


<section class="ya-dark-feature">

    <div class="ya-shell ya-split">

        <div class="reveal">

            <span class="ya-kicker">
                CAPACITÉS
            </span>

            <h2>
                Support terrain et assistance à distance
            </h2>

            <p>
                Une combinaison de support utilisateur, réseau,
                infrastructure et coordination à distance pour répondre
                aux besoins des environnements multi-sites.
            </p>

        </div>


        <div class="ya-stat-grid">

            <div class="reveal">

                <strong>
                    FR
                </strong>

                <span>
                    France
                </span>

            </div>

            <div class="reveal">

                <strong>
                    EN
                </strong>

                <span>
                    Support en anglais
                </span>

            </div>

            <div class="reveal">

                <strong>
                    L1/L2
                </strong>

                <span>
                    Support utilisateurs
                </span>

            </div>

            <div class="reveal">

                <strong>
                    Sur site
                </strong>

                <span>
                    Services terrain
                </span>

            </div>

        </div>

    </div>

</section>


<?php elseif ($slug === 'projets') : ?>

<!-- =========================================================
     PROJECTS / EXPERIENCE
========================================================= -->
<section class="ya-section ya-project-page">

    <div class="ya-shell">

        <div class="ya-section-head reveal">

            <span class="ya-kicker">
                EXPÉRIENCE TERRAIN
            </span>

            <h2>
                Missions dans différents environnements professionnels
            </h2>

            <p>
                Support utilisateurs, déploiement, réseau et infrastructure
                dans des environnements industriels, logistiques et d’entreprise.
            </p>

        </div>


        <div class="ya-card-grid ya-project-grid">

            <?php
            $projects = [

                [
                    'Marelli',
                    'Châtellerault, France',
                    'Support informatique L1/L2, Microsoft 365, postes et environnement industriel.',
                    'IT INDUSTRIEL'
                ],

                [
                    'Action Logistics',
                    'Angers / Moissy',
                    'Support terrain, réseau, préparation de postes et opérations logistiques.',
                    'LOGISTIQUE'
                ],

                [
                    'HCL Technologies',
                    'IT entreprise',
                    'Résolution d’incidents et assistance utilisateurs.',
                    'IT ENTREPRISE'
                ],

                [
                    'TECEZE',
                    'Services terrain',
                    'Diagnostic, remplacement matériel et support infrastructure.',
                    'FIELD SERVICES'
                ],

                [
                    'Cognizant',
                    'IT entreprise',
                    'Maintenance des postes, utilisateurs et assistance technique.',
                    'IT ENTREPRISE'
                ],

                [
                    'Wipro',
                    'IT professionnel',
                    'Support utilisateurs, incidents et assistance terrain.',
                    'IT PROFESSIONNEL'
                ]

            ];

            foreach ($projects as $project) :
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

            Ces références décrivent des expériences professionnelles.
            Elles ne constituent pas nécessairement une approbation
            officielle ou un partenariat commercial public.

        </p>

    </div>

</section>


<?php elseif ($slug === 'contact' || $slug === 'demander-un-devis') : ?>

<!-- =========================================================
     CONTACT / QUOTE
========================================================= -->
<section class="ya-section ya-contact-section">

    <div class="ya-shell ya-contact-layout">

        <aside class="ya-contact-panel reveal">

            <span class="ya-kicker">
                CONTACT DIRECT
            </span>

            <h2>
                <?php
                echo $slug === 'demander-un-devis'
                    ? 'Préparez votre demande'
                    : 'Nous sommes à votre écoute';
                ?>
            </h2>

            <p>
                Plus vous partagez de contexte, plus la réponse peut être précise.
            </p>


            <div class="ya-contact-lines">

                <a href="tel:<?php echo esc_attr(preg_replace('/\s+/', '', $phone)); ?>">

                    <i class="fa-solid fa-phone"></i>

                    <span>

                        <small>
                            Téléphone
                        </small>

                        <?php echo esc_html($phone); ?>

                    </span>

                </a>


                <a href="mailto:<?php echo esc_attr($email); ?>">

                    <i class="fa-regular fa-envelope"></i>

                    <span>

                        <small>
                            E-mail
                        </small>

                        <?php echo esc_html($email); ?>

                    </span>

                </a>


                <div>

                    <i class="fa-solid fa-location-dot"></i>

                    <span>

                        <small>
                            Zone
                        </small>

                        <?php echo esc_html($area); ?>

                    </span>

                </div>


                <div>

                    <i class="fa-regular fa-clock"></i>

                    <span>

                        <small>
                            Disponibilité
                        </small>

                        <?php echo esc_html($hours); ?>

                    </span>

                </div>

            </div>


            <div class="ya-contact-note">

                <i class="fa-solid fa-shield-halved"></i>

                <span>
                    Les informations envoyées sont utilisées uniquement
                    pour traiter votre demande.
                </span>

            </div>

        </aside>


        <div class="ya-form-card reveal">

            <span class="ya-kicker">

                <?php
                echo $slug === 'demander-un-devis'
                    ? 'DEMANDE DE DEVIS'
                    : 'MESSAGE';
                ?>

            </span>

            <h2>

                <?php
                echo $slug === 'demander-un-devis'
                    ? 'Décrivez votre besoin'
                    : 'Envoyez votre demande';
                ?>

            </h2>


            <?php

            $raw_content = get_the_content();

            $form_shortcode = '';

            if (
                preg_match(
                    '/\[fluentform[^\]]*id=["\']?(\d+)["\']?[^\]]*\]/i',
                    $raw_content,
                    $match
                )
            ) {

                $form_shortcode =
                    '[fluentform id="' .
                    intval($match[1]) .
                    '"]';

            }

            if (!$form_shortcode) {

                $form_shortcode =
                    '[fluentform id="1"]';

            }

            ?>


            <div class="ya-existing-form">

                <?php echo do_shortcode($form_shortcode); ?>

            </div>

        </div>

    </div>

</section>


<?php endif; ?>


<!-- =========================================================
     COMMON CTA
========================================================= -->
<section class="ya-cta ya-inner-final-cta">

    <div class="ya-shell ya-cta-in reveal">

        <div>

            <span class="ya-kicker">
                PROCHAINE ÉTAPE
            </span>

            <h2>
                Besoin d’un environnement IT plus fiable ?
            </h2>

            <p>
                Parlons du contexte et identifions ensemble la prochaine action utile.
            </p>

        </div>

        <a
            class="ya-btn"
            href="<?php echo esc_url(ya_page('demander-un-devis')); ?>"
        >

            <?php echo esc_html(ya_t('quote')); ?>

            <i class="fa-solid fa-arrow-right"></i>

        </a>

    </div>

</section>


<?php else : ?>

<!-- =========================================================
     STANDARD WORDPRESS PAGE
========================================================= -->
<section class="ya-inner-hero ya-inner-hero-compact">

    <div class="ya-inner-grid"></div>

    <div class="ya-shell">

        <span class="ya-kicker">
            YAMA AHMADI • SERVICES INFORMATIQUES
        </span>

        <h1>
            <?php echo esc_html($title); ?>
        </h1>

    </div>

</section>


<section class="ya-page">

    <div class="ya-shell ya-prose">

        <?php the_content(); ?>

    </div>

</section>

<?php endif; ?>

<?php
endwhile;

get_footer();