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