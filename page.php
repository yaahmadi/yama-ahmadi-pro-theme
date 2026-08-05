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
        'about',
        'services',
        'solutions',
        'projets',
        'projects',
        'contact',
        'demander-un-devis',
        'request-a-quote'
    ];

    $template_slug = [
        'about'           => 'a-propos',
        'projects'        => 'projets',
        'request-a-quote' => 'demander-un-devis',
    ][$slug] ?? $slug;

    $hero_map = [

        'a-propos' => [
            'À PROPOS',
            'Une expertise informatique fiable, construite sur le terrain.',
            'Support utilisateurs, réseaux, Microsoft 365, cybersécurité et interventions techniques avec une approche professionnelle, claire et orientée résultat.',
            'fa-user-gear'
        ],

        'services' => [
            'SERVICES',
            'Des services informatiques professionnels pour votre entreprise.',
            'Support L1/L2, réseaux, Microsoft 365, cybersécurité, infrastructure et interventions terrain pour maintenir vos opérations fiables et disponibles.',
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

        $hero = $hero_map[$template_slug];
?>

<!-- =========================================================
     PREMIUM INNER HERO
========================================================= -->
<section class="ya-inner-hero ya-premium-inner-hero ya-inner-hero-<?php echo esc_attr($template_slug); ?>">

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

            <?php if ($template_slug === 'a-propos' || $template_slug === 'services') : ?>

                <div class="ya-inner-hero-actions">

                    <?php if ($template_slug === 'a-propos') : ?>

                        <a class="ya-btn" href="<?php echo esc_url(ya_page('contact')); ?>">
                            Me contacter
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>

                        <a class="ya-btn ya-btn-outline" href="<?php echo esc_url(ya_page('services')); ?>">
                            Voir les services
                        </a>

                    <?php else : ?>

                        <a class="ya-btn" href="<?php echo esc_url(ya_page('demander-un-devis')); ?>">
                            Demander un devis
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>

                        <a class="ya-btn ya-btn-outline" href="<?php echo esc_url(ya_page('contact')); ?>">
                            Nous contacter
                        </a>

                    <?php endif; ?>

                </div>

            <?php endif; ?>

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


<?php if ($template_slug === 'services') : ?>

<!-- =========================================================
     SERVICES — PREMIUM FINAL
========================================================= -->
<section class="ya-section ya-services-premium">

    <div class="ya-shell">

        <div class="ya-section-head reveal">

            <span class="ya-kicker">
                SERVICES INFORMATIQUES
            </span>

            <h2>
                Des services IT professionnels pour vos opérations quotidiennes
            </h2>

            <p>
                Support utilisateurs, réseaux, cybersécurité, Microsoft 365,
                infrastructure et accompagnement technique avec une approche
                structurée, claire et orientée résultat.
            </p>

        </div>


        <div class="ya-services-showcase">

            <?php
            $services = [

                [
                    'support',
                    'headset',
                    'Support informatique',
                    'Assistance L1/L2 sur site et à distance pour utilisateurs, postes, logiciels, imprimantes et incidents courants.',
                    ['Support utilisateurs', 'Diagnostic d’incidents', 'Windows & macOS', 'Imprimantes & périphériques']
                ],

                [
                    'network',
                    'network-wired',
                    'Réseaux & Wi-Fi',
                    'Installation, diagnostic et optimisation des réseaux professionnels, Wi-Fi, switches, VLAN, DNS et connectivité.',
                    ['Wi-Fi professionnel', 'Switches & VLAN', 'DNS & connectivité', 'Diagnostic réseau']
                ],

                [
                    'security',
                    'shield-halved',
                    'Cybersécurité',
                    'Protection des comptes, postes et accès avec des pratiques adaptées aux environnements professionnels.',
                    ['Sécurisation des comptes', 'Protection des postes', 'Gestion des accès', 'Bonnes pratiques']
                ],

                [
                    'cloud',
                    'cloud',
                    'Microsoft 365 & Cloud',
                    'Administration et accompagnement Microsoft 365 pour améliorer la collaboration, la mobilité et la continuité de service.',
                    ['Teams & OneDrive', 'Exchange', 'Comptes & licences', 'Migrations']
                ],

                [
                    'infra',
                    'server',
                    'Infrastructure IT',
                    'Déploiement, maintenance et support des postes, serveurs, racks, périphériques et équipements d’entreprise.',
                    ['Postes & serveurs', 'Rack & périphériques', 'Déploiements', 'Maintenance']
                ],

                [
                    'consult',
                    'lightbulb',
                    'Conseil & accompagnement',
                    'Audit, recommandations et accompagnement technique pour améliorer la fiabilité et la performance de votre environnement IT.',
                    ['Audit IT', 'Recommandations', 'Optimisation', 'Accompagnement']
                ]

            ];

            foreach ($services as $i => $service) :

                $service_url = function_exists('ya_service_article_url')
                    ? ya_service_article_url($service[0])
                    : ya_page('services') . '#' . $service[0];

                $service_post = function_exists('ya_find_service_article')
                    ? ya_find_service_article($service[0])
                    : null;

                $fallback_images = [
                    'support'  => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=1100&q=82',
                    'network'  => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=1100&q=82',
                    'security' => 'https://images.unsplash.com/photo-1563013544-824ae1b704d3?auto=format&fit=crop&w=1100&q=82',
                    'cloud'    => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&w=1100&q=82',
                    'infra'    => 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=1100&q=82',
                    'consult'  => 'https://images.unsplash.com/photo-1521737711867-e3b97375f902?auto=format&fit=crop&w=1100&q=82',
                ];

                $service_image = function_exists('ya_service_article_image')
                    ? ya_service_article_image(
                        $service[0],
                        $fallback_images[$service[0]]
                    )
                    : $fallback_images[$service[0]];
            ?>

                <article
                    id="<?php echo esc_attr($service[0]); ?>"
                    class="ya-service-showcase-card reveal"
                    style="--delay:<?php echo esc_attr($i * 55); ?>ms"
                >

                    <a
                        class="ya-service-showcase-media"
                        href="<?php echo esc_url($service_url); ?>"
                        aria-label="<?php echo esc_attr($service[2]); ?>"
                    >
                        <img
                            src="<?php echo esc_url($service_image); ?>"
                            alt="<?php echo esc_attr($service[2]); ?>"
                            loading="lazy"
                            decoding="async"
                        >

                        <span class="ya-service-showcase-overlay"></span>

                        <span class="ya-service-showcase-number">
                            <?php echo esc_html(
                                str_pad($i + 1, 2, '0', STR_PAD_LEFT)
                            ); ?>
                        </span>

                        <span class="ya-service-showcase-icon">
                            <i class="fa-solid fa-<?php echo esc_attr($service[1]); ?>"></i>
                        </span>
                    </a>


                    <div class="ya-service-showcase-content">

                        <span class="ya-mini-label">
                            SERVICE IT
                        </span>

                        <h3>
                            <a href="<?php echo esc_url($service_url); ?>">
                                <?php echo esc_html($service[2]); ?>
                            </a>
                        </h3>

                        <p>
                            <?php echo esc_html($service[3]); ?>
                        </p>

                        <ul>
                            <?php foreach ($service[4] as $item) : ?>
                                <li>
                                    <i class="fa-solid fa-circle-check"></i>
                                    <?php echo esc_html($item); ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>

                        <a
                            class="ya-service-showcase-link"
                            href="<?php echo esc_url($service_url); ?>"
                        >
                            Lire l’article
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>

                    </div>

                </article>

            <?php endforeach; ?>

        </div>

    </div>

</section>


<!-- =========================================================
     SERVICE ADVANTAGES
========================================================= -->
<section class="ya-dark-feature ya-service-benefits">

    <div class="ya-shell">

        <div class="ya-section-head ya-section-head-light reveal">

            <span class="ya-kicker">
                POURQUOI NOUS CHOISIR
            </span>

            <h2>
                Une intervention technique claire, structurée et professionnelle
            </h2>

            <p>
                Chaque mission est préparée avec les bonnes informations,
                exécutée avec méthode et validée avant clôture.
            </p>

        </div>


        <div class="ya-process-grid">

            <?php
            $steps = [

                ['01', 'Qualification', 'Compréhension du besoin, du site, des contraintes et du niveau de priorité.'],

                ['02', 'Préparation', 'Vérification des accès, équipements, prérequis et informations techniques.'],

                ['03', 'Intervention', 'Exécution des actions prévues avec méthode et communication pendant la mission.'],

                ['04', 'Validation', 'Tests, vérification du résultat et compte rendu avant clôture.']

            ];

            foreach ($steps as $step) :
            ?>

                <article class="ya-process-card reveal">

                    <b><?php echo esc_html($step[0]); ?></b>

                    <h3><?php echo esc_html($step[1]); ?></h3>

                    <p><?php echo esc_html($step[2]); ?></p>

                </article>

            <?php endforeach; ?>

        </div>

    </div>

</section>


<!-- =========================================================
     SERVICE CTA
========================================================= -->
<section class="ya-section ya-service-contact-strip">

    <div class="ya-shell ya-service-contact-in reveal">

        <div>

            <span class="ya-kicker">
                BESOIN D’UNE INTERVENTION ?
            </span>

            <h2>
                Décrivez votre besoin et recevez une réponse claire
            </h2>

            <p>
                Indiquez le contexte, le lieu, l’équipement concerné
                et le niveau d’urgence afin de faciliter la préparation.
            </p>

        </div>

        <div class="ya-actions">

            <a
                class="ya-btn"
                href="<?php echo esc_url(ya_page('demander-un-devis')); ?>"
            >
                Demander un devis
                <i class="fa-solid fa-arrow-right"></i>
            </a>

            <a
                class="ya-btn ya-btn-outline ya-btn-dark-outline"
                href="<?php echo esc_url(ya_page('contact')); ?>"
            >
                Nous contacter
            </a>

        </div>

    </div>

</section>


<?php elseif ($template_slug === 'solutions') : ?>

<!-- =========================================================
     SOLUTIONS — PREMIUM DETAILED FINAL
========================================================= -->
<section class="ya-section ya-solutions-page ya-solutions-premium">

    <div class="ya-shell">

        <div class="ya-section-head reveal">

            <span class="ya-kicker">
                SOLUTIONS PROFESSIONNELLES
            </span>

            <h2>
                Une infrastructure IT plus stable, sécurisée et adaptée à vos opérations
            </h2>

            <p>
                Des solutions structurées autour des besoins quotidiens des entreprises :
                collaboration, sécurité, réseau, postes de travail, infrastructure,
                exploitation et interventions terrain.
            </p>

        </div>


        <div class="ya-solution-stack">

            <?php
            $solutions = [

                [
                    '01',
                    'Environnement de travail moderne',
                    'Centralisez la collaboration, les identités et les données avec Microsoft 365 afin de simplifier le travail quotidien et améliorer la continuité de service.',
                    'fa-cloud',
                    'Microsoft 365 • Teams • OneDrive • Exchange'
                ],

                [
                    '02',
                    'Réseau sécurisé',
                    'Améliorez la stabilité et la sécurité de votre réseau grâce à une architecture mieux segmentée, un Wi-Fi professionnel et une connectivité maîtrisée.',
                    'fa-shield-halved',
                    'Wi-Fi • VLAN • Firewall • VPN'
                ],

                [
                    '03',
                    'Opérations IT',
                    'Standardisez le support utilisateurs, les postes, les déploiements et la maintenance afin de réduire les incidents récurrents et gagner en efficacité.',
                    'fa-gears',
                    'L1/L2 • Équipements • Déploiement • Support'
                ],

                [
                    '04',
                    'Services terrain',
                    'Bénéficiez d’un support technique sur site pour les interventions, remplacements matériels, remote hands, rack, câblage et assistance multi-sites.',
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
                        aria-label="Nous contacter"
                    >
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>

                </article>

            <?php endforeach; ?>

        </div>

    </div>

</section>


<!-- =========================================================
     MODERN WORKPLACE DETAIL
========================================================= -->
<section class="ya-section ya-solution-detail-section">

    <div class="ya-shell ya-solution-detail-grid">

        <div class="ya-solution-detail-copy reveal">

            <span class="ya-kicker">
                MICROSOFT 365 & CLOUD
            </span>

            <h2>
                Un environnement de travail moderne pour vos équipes
            </h2>

            <p>
                Microsoft 365 permet de centraliser la messagerie, la collaboration,
                le partage documentaire et les identités. L’objectif est d’obtenir
                un environnement simple à utiliser, plus sécurisé et plus facile à administrer.
            </p>

            <div class="ya-solution-feature-list">

                <span><i class="fa-solid fa-circle-check"></i> Microsoft Teams et collaboration</span>
                <span><i class="fa-solid fa-circle-check"></i> OneDrive et partage documentaire</span>
                <span><i class="fa-solid fa-circle-check"></i> Exchange et messagerie professionnelle</span>
                <span><i class="fa-solid fa-circle-check"></i> Comptes, licences et identités</span>
                <span><i class="fa-solid fa-circle-check"></i> Migration et accompagnement utilisateurs</span>
                <span><i class="fa-solid fa-circle-check"></i> Sécurisation des accès et bonnes pratiques</span>

            </div>

        </div>

        <div class="ya-solution-detail-panel reveal">

            <div class="ya-solution-panel-icon">
                <i class="fa-brands fa-microsoft"></i>
            </div>

            <h3>
                Microsoft 365
            </h3>

            <p>
                Une plateforme adaptée aux entreprises qui souhaitent centraliser
                communication, fichiers et collaboration.
            </p>

            <div class="ya-solution-tags">
                <span>Teams</span>
                <span>OneDrive</span>
                <span>Exchange</span>
                <span>SharePoint</span>
                <span>Intune</span>
                <span>Entra ID</span>
            </div>

            <a
                class="ya-service-showcase-link"
                href="<?php echo esc_url(ya_page('contact')); ?>"
            >
                Parler de votre environnement
                <i class="fa-solid fa-arrow-right"></i>
            </a>

        </div>

    </div>

</section>


<!-- =========================================================
     NETWORK & SECURITY DETAIL
========================================================= -->
<section class="ya-dark-feature ya-solution-network-section">

    <div class="ya-shell ya-split">

        <div class="reveal">

            <span class="ya-kicker">
                RÉSEAU & SÉCURITÉ
            </span>

            <h2>
                Une connectivité fiable et mieux protégée
            </h2>

            <p>
                Une infrastructure réseau bien structurée améliore la disponibilité,
                la sécurité et l’expérience utilisateur. Diagnostic, segmentation,
                Wi-Fi, firewall et optimisation peuvent être adaptés à votre environnement.
            </p>

            <div class="ya-about-skill-tags">
                <span>Wi-Fi professionnel</span>
                <span>Switching</span>
                <span>VLAN</span>
                <span>DNS</span>
                <span>VPN</span>
                <span>Firewall</span>
                <span>Ubiquiti</span>
                <span>Cisco</span>
                <span>Fortinet</span>
            </div>

        </div>

        <div class="ya-stat-grid">

            <div class="reveal">
                <strong>Wi-Fi</strong>
                <span>Couverture & stabilité</span>
            </div>

            <div class="reveal">
                <strong>VLAN</strong>
                <span>Segmentation réseau</span>
            </div>

            <div class="reveal">
                <strong>VPN</strong>
                <span>Accès distant sécurisé</span>
            </div>

            <div class="reveal">
                <strong>24/7</strong>
                <span>Continuité à préparer</span>
            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     OPERATIONS / FIELD SERVICES
========================================================= -->
<section class="ya-section ya-solution-operations">

    <div class="ya-shell">

        <div class="ya-section-head reveal">

            <span class="ya-kicker">
                OPÉRATIONS & SERVICES TERRAIN
            </span>

            <h2>
                Du support quotidien jusqu’aux interventions sur site
            </h2>

            <p>
                Des services adaptés aux environnements multi-sites, industriels,
                logistiques, commerces et PME qui ont besoin d’une assistance
                technique fiable et documentée.
            </p>

        </div>


        <div class="ya-solution-capability-grid">

            <?php
            $capabilities = [

                [
                    'fa-headset',
                    'Support utilisateurs',
                    'Assistance L1/L2, incidents, postes, logiciels et périphériques.'
                ],

                [
                    'fa-laptop',
                    'Déploiement de postes',
                    'Préparation, configuration, remplacement et mise en service.'
                ],

                [
                    'fa-server',
                    'Remote hands',
                    'Assistance physique pour équipes IT distantes et opérations infrastructure.'
                ],

                [
                    'fa-network-wired',
                    'Infrastructure réseau',
                    'Switches, câblage, rack, équipements et diagnostic de connectivité.'
                ],

                [
                    'fa-screwdriver-wrench',
                    'Remplacement matériel',
                    'Interventions terrain pour équipements, composants et périphériques.'
                ],

                [
                    'fa-file-lines',
                    'Compte rendu',
                    'Validation, tests, documentation et remontée claire des résultats.'
                ]

            ];

            foreach ($capabilities as $item) :
            ?>

                <article class="ya-value-card ya-solution-capability-card reveal">

                    <div class="ya-card-icon">
                        <i class="fa-solid <?php echo esc_attr($item[0]); ?>"></i>
                    </div>

                    <h3>
                        <?php echo esc_html($item[1]); ?>
                    </h3>

                    <p>
                        <?php echo esc_html($item[2]); ?>
                    </p>

                </article>

            <?php endforeach; ?>

        </div>

    </div>

</section>


<!-- =========================================================
     SOLUTION PROCESS
========================================================= -->
<section class="ya-section ya-solution-process-section">

    <div class="ya-shell">

        <div class="ya-section-head reveal">

            <span class="ya-kicker">
                MÉTHODE
            </span>

            <h2>
                Une solution adaptée commence par une bonne compréhension du besoin
            </h2>

        </div>

        <div class="ya-process-grid">

            <?php
            $solution_steps = [

                ['01', 'Analyser', 'Comprendre les utilisateurs, les équipements, l’infrastructure et les contraintes.'],

                ['02', 'Concevoir', 'Définir une approche réaliste, claire et adaptée au contexte opérationnel.'],

                ['03', 'Déployer', 'Mettre en œuvre les actions avec méthode, tests et coordination.'],

                ['04', 'Améliorer', 'Documenter, recommander les prochaines actions et réduire les incidents récurrents.']

            ];

            foreach ($solution_steps as $step) :
            ?>

                <article class="ya-process-card ya-solution-process-card reveal">

                    <b><?php echo esc_html($step[0]); ?></b>

                    <h3><?php echo esc_html($step[1]); ?></h3>

                    <p><?php echo esc_html($step[2]); ?></p>

                </article>

            <?php endforeach; ?>

        </div>

    </div>

</section>


<?php elseif ($template_slug === 'a-propos') : ?>

<!-- =========================================================
     ABOUT — PREMIUM PROFILE / EXPERIENCE
========================================================= -->
<section class="ya-section ya-about-section ya-about-premium">
    <div class="ya-shell ya-about-grid">
        <div class="ya-about-copy reveal">
            <span class="ya-kicker">EXPERTISE & TERRAIN</span>
            <h2>Un support informatique professionnel, construit sur l’expérience terrain.</h2>
            <p>Basé à Poitiers, Yama Ahmadi accompagne les entreprises pour le support utilisateurs, les réseaux, Microsoft 365, la cybersécurité, l’infrastructure et les interventions techniques sur site.</p>
            <p>Chaque mission repose sur une méthode simple : comprendre le besoin, préparer l’intervention, agir avec précision, tester le résultat et communiquer clairement avec le client ou l’équipe IT distante.</p>

            <div class="ya-about-points">
                <span><i class="fa-solid fa-circle-check"></i> Support L1/L2 sur site et à distance</span>
                <span><i class="fa-solid fa-circle-check"></i> Réseaux, Wi-Fi, postes et infrastructure</span>
                <span><i class="fa-solid fa-circle-check"></i> Microsoft 365 et environnements professionnels</span>
                <span><i class="fa-solid fa-circle-check"></i> Interventions terrain dans toute la France</span>
            </div>

            <div class="ya-actions">
                <a class="ya-btn" href="<?php echo esc_url(ya_page('contact')); ?>">Me contacter <i class="fa-solid fa-arrow-right"></i></a>
                <a class="ya-btn ya-btn-outline" href="<?php echo esc_url(ya_page('projets')); ?>">Voir les expériences</a>
            </div>
        </div>

        <div class="ya-about-profile reveal">
            <div class="ya-about-profile-visual">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('large', ['class' => 'ya-about-photo', 'alt' => 'Yama Ahmadi - Services informatiques']); ?>
                <?php else : ?>
                    <div class="ya-about-photo-placeholder">
                        <i class="fa-solid fa-user-gear"></i>
                        <span>Yama Ahmadi</span>
                        <small>Services informatiques</small>
                    </div>
                <?php endif; ?>
                <span class="ya-about-status"><i class="fa-solid fa-circle"></i> Disponible pour interventions</span>
            </div>
            <div class="ya-about-profile-meta">
                <strong>Poitiers, France</strong>
                <span>Support IT • Réseau • Infrastructure</span>
            </div>
        </div>
    </div>
</section>

<section class="ya-section ya-about-values-section">
    <div class="ya-shell">
        <div class="ya-section-head reveal">
            <span class="ya-kicker">NOTRE ENGAGEMENT</span>
            <h2>Une prestation claire, fiable et orientée résultat</h2>
            <p>Des principes simples appliqués à chaque intervention, du premier échange jusqu’à la validation technique.</p>
        </div>

        <div class="ya-value-grid">
            <?php
            $values = [
                ['fa-bolt', 'Réactivité', 'Une prise en charge rapide selon la disponibilité, le contexte et le niveau de priorité.'],
                ['fa-list-check', 'Méthode', 'Qualification, préparation, intervention, tests et compte rendu pour garder une mission structurée.'],
                ['fa-shield-halved', 'Fiabilité', 'Des actions orientées stabilité, sécurité et continuité des opérations informatiques.'],
                ['fa-comments', 'Communication', 'Des échanges clairs en français et en anglais avec les utilisateurs, clients et équipes techniques.']
            ];
            foreach ($values as $value) :
            ?>
                <article class="ya-value-card reveal">
                    <div class="ya-card-icon"><i class="fa-solid <?php echo esc_attr($value[0]); ?>"></i></div>
                    <h3><?php echo esc_html($value[1]); ?></h3>
                    <p><?php echo esc_html($value[2]); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="ya-dark-feature ya-about-capabilities">
    <div class="ya-shell ya-split">
        <div class="reveal">
            <span class="ya-kicker">CAPACITÉS TECHNIQUES</span>
            <h2>Du poste utilisateur jusqu’à l’infrastructure réseau.</h2>
            <p>Une couverture technique adaptée aux PME, sites industriels, commerces, environnements logistiques et missions de field services.</p>
            <div class="ya-about-skill-tags">
                <span>Windows</span><span>Microsoft 365</span><span>Intune</span>
                <span>Wi-Fi</span><span>Switching</span><span>VLAN</span>
                <span>DNS</span><span>VPN</span><span>Cybersécurité</span>
                <span>Remote Hands</span><span>Déploiement</span><span>Support L1/L2</span>
            </div>
        </div>

        <div class="ya-stat-grid">
            <div class="reveal"><strong>L1/L2</strong><span>Support utilisateurs</span></div>
            <div class="reveal"><strong>FR</strong><span>Interventions en France</span></div>
            <div class="reveal"><strong>Sur site</strong><span>Field services</span></div>
            <div class="reveal"><strong>Remote</strong><span>Assistance à distance</span></div>
        </div>
    </div>
</section>

<section class="ya-section ya-about-process">
    <div class="ya-shell">
        <div class="ya-section-head reveal">
            <span class="ya-kicker">MÉTHODE D’INTERVENTION</span>
            <h2>Une mission maîtrisée de bout en bout</h2>
        </div>
        <div class="ya-process-grid">
            <?php
            $about_steps = [
                ['01','Comprendre','Identifier le besoin, l’environnement, les contraintes et le niveau d’urgence.'],
                ['02','Préparer','Valider les accès, équipements, prérequis et informations nécessaires.'],
                ['03','Intervenir','Exécuter les actions prévues avec méthode et coordination technique.'],
                ['04','Valider','Tester, documenter le résultat et confirmer la remise en service.']
            ];
            foreach ($about_steps as $step) :
            ?>
                <article class="ya-process-card reveal">
                    <b><?php echo esc_html($step[0]); ?></b>
                    <h3><?php echo esc_html($step[1]); ?></h3>
                    <p><?php echo esc_html($step[2]); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<?php elseif ($template_slug === 'projets') : ?>

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


<?php elseif ($template_slug === 'contact' || $template_slug === 'demander-un-devis') : ?>

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
                echo $template_slug === 'demander-un-devis'
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
                echo $template_slug === 'demander-un-devis'
                    ? 'DEMANDE DE DEVIS'
                    : 'MESSAGE';
                ?>

            </span>

            <h2>

                <?php
                echo $template_slug === 'demander-un-devis'
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