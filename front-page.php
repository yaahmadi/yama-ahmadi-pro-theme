<?php
/**
 * Yama Ahmadi Pro v3.0.0 — Premium App Homepage
 * French / English / German
 */

defined('ABSPATH') || exit;

get_header();

$lang = ya_lang();
$brand_assets = function_exists('ya_brand_assets') ? ya_brand_assets() : [];

$home_i18n = [

    'fr' => [
        'hero_core'       => 'CLOUD SÉCURISÉ',
        'node_infra'      => 'Infrastructure',
        'node_security'   => 'Sécurité',
        'node_network'    => 'Réseaux',
        'node_support'    => 'Support',

        'strip_workplace' => 'Espace de travail',
        'strip_network'   => 'Réseaux',
        'strip_security'  => 'Cybersécurité',
        'strip_field'     => 'Interventions IT',
        'strip_france'    => 'Partout en France',

        'trust_support_t'  => 'Support L1 / L2',
        'trust_support_s'  => 'Sur site et à distance',
        'trust_network_t'  => 'Ingénierie réseau',
        'trust_network_s'  => 'Wi-Fi, VLAN, switches et routage',
        'trust_security_t' => 'Sécurité IT',
        'trust_security_s' => 'Comptes, postes et infrastructure',
        'trust_field_t'    => 'Services terrain',
        'trust_field_s'    => 'Interventions professionnelles en France',

        'services' => [
            ['headset', 'Support informatique', 'Assistance L1/L2 sur site et à distance, postes, logiciels, imprimantes et incidents utilisateurs.', 'support', '01', 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=900&q=82'],
            ['network-wired', 'Réseaux & Wi-Fi', 'Installation et optimisation Wi-Fi, switches, routeurs, VLAN, pare-feu et connectivité.', 'network', '02', 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=900&q=82'],
            ['shield-halved', 'Cybersécurité', 'Protection des postes, comptes, accès, sauvegardes et réseaux professionnels.', 'security', '03', 'https://images.unsplash.com/photo-1563013544-824ae1b704d3?auto=format&fit=crop&w=900&q=82'],
            ['cloud', 'Microsoft 365 & Cloud', 'Exchange, Teams, OneDrive, SharePoint, comptes, migrations et accompagnement cloud.', 'cloud', '04', 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&w=900&q=82'],
            ['server', 'Infrastructure IT', 'Déploiement, maintenance, périphériques, postes, serveurs et environnements professionnels.', 'infra', '05', 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=900&q=82'],
            ['lightbulb', 'Conseil & accompagnement', 'Audit, recommandations, choix de solutions et amélioration des performances IT.', 'consult', '06', 'https://images.unsplash.com/photo-1521737711867-e3b97375f902?auto=format&fit=crop&w=900&q=82'],
        ],

        'why_text'        => 'Une approche terrain, structurée et orientée résultat pour maintenir vos utilisateurs, vos équipements et votre infrastructure opérationnels.',
        'why_points'      => [
            'Qualification claire avant intervention',
            'Communication pendant la mission',
            'Tests et validation avant clôture',
        ],
        'view_experience' => 'Voir les expériences',
        'stats' => [
            ['120+', 'Interventions'],
            ['6', 'Domaines IT'],
            ['L1/L2', 'Support professionnel'],
            ['FR', 'Intervention terrain'],
        ],

        'tech_kicker' => 'TECHNOLOGIES & EXPERTISES',
        'tech_title'  => 'Des environnements techniques adaptés aux entreprises',
        'tech_text'   => 'Des technologies utilisées quotidiennement dans les environnements professionnels, intégrées dans une approche orientée stabilité, sécurité et exploitation.',

        'projects_kicker' => 'RÉFÉRENCES PROFESSIONNELLES',
        'projects_title'  => 'Expérience dans des environnements IT exigeants',
        'projects_text'   => 'Missions terrain, support utilisateurs, infrastructure, déploiement et réseau réalisées dans différents environnements professionnels.',
        'projects' => [
            ['Marelli', 'Châtellerault, France', 'Support informatique L1/L2, Microsoft 365, postes de travail et environnement industriel.', 'IT INDUSTRIEL'],
            ['Action Logistics', 'Angers, France', 'Assistance technique, support réseau, préparation de postes et accompagnement sur site.', 'IT LOGISTIQUE'],
            ['HCL Technologies', 'IT entreprise', 'Support technique, résolution d’incidents et assistance utilisateurs.', 'ENTREPRISE'],
            ['TECEZE', 'Services IT terrain', 'Interventions terrain, diagnostic, remplacement matériel et support infrastructure.', 'SERVICES TERRAIN'],
            ['Cognizant', 'IT entreprise', 'Assistance utilisateurs, maintenance des postes et accompagnement technique.', 'ENTREPRISE'],
            ['Wipro', 'IT professionnel', 'Support utilisateurs, gestion d’incidents et assistance technique.', 'IT PROFESSIONNEL'],
        ],
        'disclaimer' => 'Les références ci-dessus représentent des expériences et missions professionnelles réalisées dans différents environnements IT. Elles ne constituent pas nécessairement une approbation officielle ou un partenariat commercial public avec les entreprises citées.',

        'partner_kicker' => 'ENVIRONNEMENTS & TECHNOLOGIES',
        'partner_text'   => 'Expérience au contact d’équipes, plateformes et environnements professionnels variés.',
        'partner_aria'   => 'Environnements professionnels',

        'blog_kicker' => 'BLOG & CONSEILS',
        'cta_kicker'  => 'BESOIN D’ASSISTANCE ?',
    ],

    'en' => [
        'hero_core'       => 'SECURE CLOUD',
        'node_infra'      => 'Infrastructure',
        'node_security'   => 'Security',
        'node_network'    => 'Networks',
        'node_support'    => 'Support',

        'strip_workplace' => 'Workplace',
        'strip_network'   => 'Networks',
        'strip_security'  => 'Cybersecurity',
        'strip_field'     => 'Field IT',
        'strip_france'    => 'Across France',

        'trust_support_t'  => 'L1 / L2 Support',
        'trust_support_s'  => 'On-site and remote',
        'trust_network_t'  => 'Network Engineering',
        'trust_network_s'  => 'Wi-Fi, VLANs, switches and routing',
        'trust_security_t' => 'IT Security',
        'trust_security_s' => 'Accounts, endpoints and infrastructure',
        'trust_field_t'    => 'Field Services',
        'trust_field_s'    => 'Professional interventions across France',

        'services' => [
            ['headset', 'IT Support', 'On-site and remote L1/L2 assistance for users, computers, software, printers and incidents.', 'support', '01', 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=900&q=82'],
            ['network-wired', 'Networks & Wi-Fi', 'Installation and optimization of Wi-Fi, switches, routers, VLANs, firewalls and connectivity.', 'network', '02', 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=900&q=82'],
            ['shield-halved', 'Cybersecurity', 'Protection for endpoints, accounts, access, backups and professional networks.', 'security', '03', 'https://images.unsplash.com/photo-1563013544-824ae1b704d3?auto=format&fit=crop&w=900&q=82'],
            ['cloud', 'Microsoft 365 & Cloud', 'Exchange, Teams, OneDrive, SharePoint, accounts, migrations and cloud support.', 'cloud', '04', 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&w=900&q=82'],
            ['server', 'IT Infrastructure', 'Deployment, maintenance, peripherals, workstations, servers and business environments.', 'infra', '05', 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=900&q=82'],
            ['lightbulb', 'Consulting & Guidance', 'Audits, recommendations, solution selection and IT performance improvement.', 'consult', '06', 'https://images.unsplash.com/photo-1521737711867-e3b97375f902?auto=format&fit=crop&w=900&q=82'],
        ],

        'why_text'        => 'A structured, field-focused and results-oriented approach to keep your users, equipment and infrastructure operational.',
        'why_points'      => [
            'Clear qualification before intervention',
            'Communication throughout the assignment',
            'Testing and validation before closure',
        ],
        'view_experience' => 'View experience',
        'stats' => [
            ['120+', 'Interventions'],
            ['6', 'IT domains'],
            ['L1/L2', 'Professional support'],
            ['FR', 'Field coverage'],
        ],

        'tech_kicker' => 'TECHNOLOGIES & EXPERTISE',
        'tech_title'  => 'Technical environments designed for business',
        'tech_text'   => 'Technologies used daily in professional environments, integrated through an approach focused on stability, security and operations.',

        'projects_kicker' => 'PROFESSIONAL EXPERIENCE',
        'projects_title'  => 'Experience in demanding IT environments',
        'projects_text'   => 'Field assignments, user support, infrastructure, deployments and networking delivered across different professional environments.',
        'projects' => [
            ['Marelli', 'Châtellerault, France', 'L1/L2 IT support, Microsoft 365, workstations and industrial environment support.', 'INDUSTRIAL IT'],
            ['Action Logistics', 'Angers, France', 'Technical assistance, network support, workstation preparation and on-site support.', 'LOGISTICS IT'],
            ['HCL Technologies', 'Enterprise IT', 'Technical support, incident resolution and user assistance.', 'ENTERPRISE'],
            ['TECEZE', 'Field IT Services', 'Field interventions, diagnostics, hardware replacement and infrastructure support.', 'FIELD SERVICES'],
            ['Cognizant', 'Enterprise IT', 'User support, workstation maintenance and technical assistance.', 'ENTERPRISE'],
            ['Wipro', 'Professional IT', 'User support, incident management and technical assistance.', 'PROFESSIONAL IT'],
        ],
        'disclaimer' => 'The references above describe professional assignments and experience in different IT environments. They do not necessarily constitute official endorsement or a public commercial partnership with the companies named.',

        'partner_kicker' => 'ENVIRONMENTS & TECHNOLOGIES',
        'partner_text'   => 'Experience working with varied teams, platforms and professional environments.',
        'partner_aria'   => 'Professional environments',

        'blog_kicker' => 'BLOG & INSIGHTS',
        'cta_kicker'  => 'NEED SUPPORT?',
    ],

    'de' => [
        'hero_core'       => 'SICHERE CLOUD',
        'node_infra'      => 'Infrastruktur',
        'node_security'   => 'Sicherheit',
        'node_network'    => 'Netzwerke',
        'node_support'    => 'Support',

        'strip_workplace' => 'Arbeitsplatz',
        'strip_network'   => 'Netzwerke',
        'strip_security'  => 'Cybersicherheit',
        'strip_field'     => 'Vor-Ort-IT',
        'strip_france'    => 'In ganz Frankreich',

        'trust_support_t'  => 'L1 / L2 Support',
        'trust_support_s'  => 'Vor Ort und remote',
        'trust_network_t'  => 'Netzwerktechnik',
        'trust_network_s'  => 'Wi-Fi, VLANs, Switches und Routing',
        'trust_security_t' => 'IT-Sicherheit',
        'trust_security_s' => 'Konten, Endgeräte und Infrastruktur',
        'trust_field_t'    => 'Vor-Ort-Services',
        'trust_field_s'    => 'Professionelle Einsätze in Frankreich',

        'services' => [
            ['headset', 'IT-Support', 'L1/L2-Unterstützung vor Ort und remote für Benutzer, Computer, Software, Drucker und Störungen.', 'support', '01', 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=900&q=82'],
            ['network-wired', 'Netzwerke & Wi-Fi', 'Installation und Optimierung von Wi-Fi, Switches, Routern, VLANs, Firewalls und Konnektivität.', 'network', '02', 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=900&q=82'],
            ['shield-halved', 'Cybersicherheit', 'Schutz von Endgeräten, Konten, Zugriffen, Backups und professionellen Netzwerken.', 'security', '03', 'https://images.unsplash.com/photo-1563013544-824ae1b704d3?auto=format&fit=crop&w=900&q=82'],
            ['cloud', 'Microsoft 365 & Cloud', 'Exchange, Teams, OneDrive, SharePoint, Konten, Migrationen und Cloud-Unterstützung.', 'cloud', '04', 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&w=900&q=82'],
            ['server', 'IT-Infrastruktur', 'Bereitstellung, Wartung, Peripheriegeräte, Arbeitsplätze, Server und Unternehmensumgebungen.', 'infra', '05', 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=900&q=82'],
            ['lightbulb', 'Beratung & Begleitung', 'Audits, Empfehlungen, Lösungsauswahl und Verbesserung der IT-Leistung.', 'consult', '06', 'https://images.unsplash.com/photo-1521737711867-e3b97375f902?auto=format&fit=crop&w=900&q=82'],
        ],

        'why_text'        => 'Ein strukturierter, praxisnaher und ergebnisorientierter Ansatz, um Benutzer, Geräte und Infrastruktur betriebsbereit zu halten.',
        'why_points'      => [
            'Klare Qualifizierung vor dem Einsatz',
            'Kommunikation während des gesamten Auftrags',
            'Tests und Validierung vor Abschluss',
        ],
        'view_experience' => 'Erfahrung ansehen',
        'stats' => [
            ['120+', 'Einsätze'],
            ['6', 'IT-Bereiche'],
            ['L1/L2', 'Professioneller Support'],
            ['FR', 'Vor-Ort-Abdeckung'],
        ],

        'tech_kicker' => 'TECHNOLOGIEN & EXPERTISE',
        'tech_title'  => 'Technische Umgebungen für Unternehmen',
        'tech_text'   => 'Technologien, die täglich in professionellen Umgebungen eingesetzt werden, mit Fokus auf Stabilität, Sicherheit und Betrieb.',

        'projects_kicker' => 'BERUFLICHE ERFAHRUNG',
        'projects_title'  => 'Erfahrung in anspruchsvollen IT-Umgebungen',
        'projects_text'   => 'Vor-Ort-Einsätze, Benutzersupport, Infrastruktur, Bereitstellungen und Netzwerkarbeiten in unterschiedlichen professionellen Umgebungen.',
        'projects' => [
            ['Marelli', 'Châtellerault, Frankreich', 'L1/L2-IT-Support, Microsoft 365, Arbeitsplätze und industrielle Umgebung.', 'INDUSTRIELLE IT'],
            ['Action Logistics', 'Angers, Frankreich', 'Technische Unterstützung, Netzwerksupport, Arbeitsplatzvorbereitung und Vor-Ort-Begleitung.', 'LOGISTIK-IT'],
            ['HCL Technologies', 'Unternehmens-IT', 'Technischer Support, Störungsbehebung und Benutzerunterstützung.', 'UNTERNEHMEN'],
            ['TECEZE', 'Vor-Ort-IT-Services', 'Vor-Ort-Einsätze, Diagnose, Hardwareaustausch und Infrastruktur-Support.', 'VOR-ORT-SERVICES'],
            ['Cognizant', 'Unternehmens-IT', 'Benutzersupport, Arbeitsplatzwartung und technische Begleitung.', 'UNTERNEHMEN'],
            ['Wipro', 'Professionelle IT', 'Benutzersupport, Incident-Management und technische Unterstützung.', 'PROFESSIONELLE IT'],
        ],
        'disclaimer' => 'Die oben genannten Referenzen beschreiben berufliche Einsätze und Erfahrungen in unterschiedlichen IT-Umgebungen. Sie stellen nicht zwingend eine offizielle Empfehlung oder öffentliche Geschäftspartnerschaft mit den genannten Unternehmen dar.',

        'partner_kicker' => 'UMGEBUNGEN & TECHNOLOGIEN',
        'partner_text'   => 'Erfahrung in der Zusammenarbeit mit unterschiedlichen Teams, Plattformen und professionellen Umgebungen.',
        'partner_aria'   => 'Professionelle Umgebungen',

        'blog_kicker' => 'BLOG & EINBLICKE',
        'cta_kicker'  => 'BENÖTIGEN SIE SUPPORT?',
    ],
];

$H = $home_i18n[$lang] ?? $home_i18n['fr'];

$services_url = ya_page('services');
$quote_url    = ya_page('demander-un-devis');
$contact_url  = ya_page('contact');
$projects_url = ya_page('projets');
?>

<section class="ya-v305-hero" aria-labelledby="ya-v305-title">
    <video class="ya-v305-hero-media" autoplay muted loop playsinline preload="metadata" poster="https://yamaahmadi.fr/wp-content/uploads/2024/11/Untitled-high1-1.gif" aria-hidden="true">
        <source src="https://yamaahmadi.fr/wp-content/uploads/2024/11/Header-yama-Ahmadi-IT.mp4" type="video/mp4">
    </video>
    <div class="ya-v305-hero-fallback" aria-hidden="true"></div>
    <div class="ya-v305-hero-shade" aria-hidden="true"></div>

    <div class="ya-shell ya-v305-hero-inner">
        <div class="ya-v305-hero-content">
            <span class="ya-v305-kicker"><?php echo esc_html(ya_t('hero_kicker')); ?></span>
            <h1 id="ya-v305-title"><?php echo esc_html(ya_t('hero_title')); ?></h1>
            <p><?php echo esc_html(ya_t('hero_text')); ?></p>
            <div class="ya-v305-actions">
                <a class="ya-v305-btn ya-v305-btn-primary" href="<?php echo esc_url($services_url); ?>">
                    <?php echo esc_html(ya_t('hero_cta')); ?><i class="fa-solid fa-arrow-right"></i>
                </a>
                <a class="ya-v305-btn ya-v305-btn-secondary" href="<?php echo esc_url($quote_url); ?>">
                    <?php echo esc_html(ya_t('hero_quote')); ?>
                </a>
            </div>
            <div class="ya-v305-trust">
                <span><i class="fa-solid fa-bolt"></i><?php echo esc_html(ya_t('response')); ?></span>
                <span><i class="fa-solid fa-certificate"></i><?php echo esc_html(ya_t('certified')); ?></span>
                <span><i class="fa-solid fa-location-dot"></i><?php echo esc_html(ya_t('coverage')); ?></span>
            </div>
        </div>

        <div class="ya-v305-hero-visual" aria-hidden="true">
            <div class="ya-v305-orbit ya-v305-orbit-a"></div>
            <div class="ya-v305-orbit ya-v305-orbit-b"></div>
            <div class="ya-v305-core"><i class="fa-solid fa-cloud"></i><small><?php echo esc_html($H['hero_core']); ?></small></div>
            <span class="ya-v305-node ya-v305-n1"><i class="fa-solid fa-server"></i></span>
            <span class="ya-v305-node ya-v305-n2"><i class="fa-solid fa-shield-halved"></i></span>
            <span class="ya-v305-node ya-v305-n3"><i class="fa-solid fa-wifi"></i></span>
            <span class="ya-v305-node ya-v305-n4"><i class="fa-solid fa-laptop"></i></span>
        </div>
    </div>
</section>


<section class="ya-home-trust">
    <div class="ya-shell ya-home-trust-grid">
        <?php
        $trust_items = [
            ['fa-headset', $H['trust_support_t'], $H['trust_support_s']],
            ['fa-network-wired', $H['trust_network_t'], $H['trust_network_s']],
            ['fa-shield-halved', $H['trust_security_t'], $H['trust_security_s']],
            ['fa-location-crosshairs', $H['trust_field_t'], $H['trust_field_s']],
        ];
        foreach ($trust_items as $item):
        ?>
            <div class="ya-home-trust-item reveal">
                <i class="fa-solid <?php echo esc_attr($item[0]); ?>"></i>
                <div><strong><?php echo esc_html($item[1]); ?></strong><span><?php echo esc_html($item[2]); ?></span></div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<section id="ya-home-services" class="ya-section ya-services-section">
    <div class="ya-shell">
        <div class="ya-section-head reveal">
            <span class="ya-kicker"><?php echo esc_html(ya_t('services')); ?></span>
            <h2><?php echo esc_html(ya_t('services_title')); ?></h2>
            <p><?php echo esc_html(ya_t('services_intro')); ?></p>
        </div>

        <div class="ya-card-grid ya-services-grid">
            <?php foreach ($H['services'] as $i => $service):
                $service_url = function_exists('ya_service_article_url')
                    ? ya_service_article_url($service[3])
                    : $services_url . '#' . $service[3];

                $service_image = function_exists('ya_service_article_image')
                    ? ya_service_article_image($service[3], $service[5])
                    : $service[5];
            ?>
                <article class="ya-premium-card ya-home-service-card reveal" style="--delay:<?php echo esc_attr($i * 55); ?>ms">
                    <a class="ya-service-media" href="<?php echo esc_url($service_url); ?>" aria-label="<?php echo esc_attr($service[1]); ?>">
                        <img src="<?php echo esc_url($service_image); ?>" alt="<?php echo esc_attr($service[1]); ?>" loading="lazy" decoding="async">
                        <span class="ya-service-media-overlay"></span>
                    </a>
                    <span class="ya-card-number"><?php echo esc_html($service[4]); ?></span>
                    <div class="ya-card-icon"><i class="fa-solid fa-<?php echo esc_attr($service[0]); ?>"></i></div>
                    <h3><a href="<?php echo esc_url($service_url); ?>"><?php echo esc_html($service[1]); ?></a></h3>
                    <p><?php echo esc_html($service[2]); ?></p>
                    <a class="ya-service-readmore" href="<?php echo esc_url($service_url); ?>">
                        <?php echo esc_html(ya_t('readmore')); ?>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="ya-dark-feature ya-home-why">
    <div class="ya-shell ya-split">
        <div class="reveal">
            <span class="ya-kicker"><?php echo esc_html(ya_t('why')); ?></span>
            <h2><?php echo esc_html(ya_t('why_title')); ?></h2>
            <p><?php echo esc_html($H['why_text']); ?></p>

            <div class="ya-why-points">
                <?php foreach ($H['why_points'] as $point): ?>
                    <span><i class="fa-solid fa-circle-check"></i><?php echo esc_html($point); ?></span>
                <?php endforeach; ?>
            </div>

            <div class="ya-actions">
                <a class="ya-btn" href="<?php echo esc_url($contact_url); ?>"><?php echo esc_html(ya_t('contact')); ?></a>
                <a class="ya-text-link" href="<?php echo esc_url($projects_url); ?>">
                    <?php echo esc_html($H['view_experience']); ?>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <div class="ya-stat-grid">
            <?php foreach ($H['stats'] as $stat): ?>
                <div class="reveal"><strong><?php echo esc_html($stat[0]); ?></strong><span><?php echo esc_html($stat[1]); ?></span></div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="ya-section ya-technology-section">
    <div class="ya-shell">
        <div class="ya-section-head reveal">
            <span class="ya-kicker"><?php echo esc_html($H['tech_kicker']); ?></span>
            <h2><?php echo esc_html($H['tech_title']); ?></h2>
            <p><?php echo esc_html($H['tech_text']); ?></p>
        </div>

        <div class="ya-tech-grid">
            <?php
            $technologies = [
                ['Microsoft 365', 'microsoft365'], ['Microsoft Azure', 'azure'],
                ['Windows', 'windows'], ['Microsoft', 'microsoft'],
                ['Cisco', 'cisco'], ['Fortinet', 'fortinet'],
                ['VMware', 'vmware'], ['Ubiquiti', 'ubiquiti'],
                ['Apple', 'apple'], ['macOS', 'macos'], ['Linux', 'linux'],
                ['Dell', 'dell'], ['HP', 'hp'], ['Lenovo', 'lenovo']
            ];
            foreach ($technologies as $tech):
                $tech_logo = $brand_assets[$tech[1]] ?? '';
            ?>
                <div class="ya-tech-chip ya-tech-chip-logo reveal" data-brand="<?php echo esc_attr($tech[1]); ?>">
                    <span class="ya-tech-icon ya-tech-logo-wrap">
                        <?php if ($tech_logo): ?>
                            <img src="<?php echo esc_url($tech_logo); ?>" alt="<?php echo esc_attr($tech[0]); ?>" loading="lazy" decoding="async">
                        <?php else: ?>
                            <i class="fa-solid fa-microchip" aria-hidden="true"></i>
                        <?php endif; ?>
                    </span>
                    <span class="screen-reader-text"><?php echo esc_html($tech[0]); ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="ya-section ya-project-section">
    <div class="ya-shell">
        <div class="ya-section-head reveal">
            <span class="ya-kicker"><?php echo esc_html($H['projects_kicker']); ?></span>
            <h2><?php echo esc_html($H['projects_title']); ?></h2>
            <p><?php echo esc_html($H['projects_text']); ?></p>
        </div>

        <div class="ya-card-grid ya-project-grid">
            <?php foreach ($H['projects'] as $project):
                $project_key = [
                    'Marelli' => 'marelli',
                    'Action Logistics' => 'action',
                    'HCL Technologies' => 'hcltech',
                    'TECEZE' => 'teceze',
                    'Cognizant' => 'cognizant',
                    'Wipro' => 'wipro',
                ][$project[0]] ?? '';
                $project_logo = $project_key ? ($brand_assets[$project_key] ?? '') : '';
            ?>
                <article class="ya-project-card ya-home-project-card reveal" data-brand="<?php echo esc_attr($project_key); ?>">
                    <div class="ya-project-top">
                        <span class="ya-mini-label"><?php echo esc_html($project[3]); ?></span>
                        <span class="ya-project-arrow"><i class="fa-solid fa-arrow-up-right"></i></span>
                    </div>
                    <?php if ($project_logo): ?>
                        <div class="ya-project-brand"><img src="<?php echo esc_url($project_logo); ?>" alt="<?php echo esc_attr($project[0]); ?>" loading="lazy" decoding="async"></div>
                    <?php endif; ?>
                    <?php if ($project_logo): ?>
                        <h3 class="screen-reader-text"><?php echo esc_html($project[0]); ?></h3>
                    <?php else: ?>
                        <h3><?php echo esc_html($project[0]); ?></h3>
                    <?php endif; ?>
                    <small><?php echo esc_html($project[1]); ?></small>
                    <p><?php echo esc_html($project[2]); ?></p>
                </article>
            <?php endforeach; ?>
        </div>

        <p class="ya-disclaimer"><?php echo esc_html($H['disclaimer']); ?></p>
    </div>
</section>

<section class="ya-partner-band">
    <div class="ya-shell">
        <div class="ya-partner-title reveal">
            <span class="ya-kicker"><?php echo esc_html($H['partner_kicker']); ?></span>
            <p><?php echo esc_html($H['partner_text']); ?></p>
        </div>
    </div>

    <div class="ya-marquee" aria-label="<?php echo esc_attr($H['partner_aria']); ?>">
        <div class="ya-marquee-fade ya-marquee-fade-left"></div>
        <div class="ya-marquee-fade ya-marquee-fade-right"></div>
        <div class="ya-marquee-track">
            <?php
            $brands = [
                ['MARELLI', 'marelli', $brand_assets['marelli'] ?? ''],
                ['ACTION', 'action', $brand_assets['action'] ?? ''],
                ['HCLTECH', 'hcltech', $brand_assets['hcltech'] ?? ''],
                ['TECEZE', 'teceze', $brand_assets['teceze'] ?? ''],
                ['COGNIZANT', 'cognizant', $brand_assets['cognizant'] ?? ''],
                ['WIPRO', 'wipro', $brand_assets['wipro'] ?? ''],
                ['MICROSOFT', 'microsoft', $brand_assets['microsoft'] ?? ''],
                ['CISCO', 'cisco', $brand_assets['cisco'] ?? ''],
                ['FORTINET', 'fortinet', $brand_assets['fortinet'] ?? ''],
                ['UBIQUITI', 'ubiquiti', $brand_assets['ubiquiti'] ?? ''],
                ['LENOVO', 'lenovo', $brand_assets['lenovo'] ?? ''],
                ['HP', 'hp', $brand_assets['hp'] ?? ''],
                ['DELL', 'dell', $brand_assets['dell'] ?? ''],
                ['VMWARE', 'vmware', $brand_assets['vmware'] ?? ''],
                ['AZURE', 'azure', $brand_assets['azure'] ?? ''],
                ['MICROSOFT 365', 'microsoft365', $brand_assets['microsoft365'] ?? ''],
                ['WINDOWS', 'windows', $brand_assets['windows'] ?? ''],
                ['APPLE', 'apple', $brand_assets['apple'] ?? ''],
                ['MACOS', 'macos', $brand_assets['macos'] ?? ''],
                ['LINUX', 'linux', $brand_assets['linux'] ?? ''],
            ];

            for ($repeat = 0; $repeat < 2; $repeat++):
                foreach ($brands as $brand):
            ?>
                    <span class="ya-partner-logo" data-brand="<?php echo esc_attr($brand[1]); ?>" title="<?php echo esc_attr($brand[0]); ?>">
                        <?php if (!empty($brand[2])): ?>
                            <img src="<?php echo esc_url($brand[2]); ?>" alt="<?php echo esc_attr($brand[0]); ?>" loading="lazy" decoding="async">
                        <?php else: ?>
                            <span class="ya-partner-monogram"><?php echo esc_html(substr($brand[0], 0, 2)); ?></span>
                        <?php endif; ?>
                    </span>
            <?php
                endforeach;
            endfor;
            ?>
        </div>
    </div>
</section>

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
            <span class="ya-kicker"><?php echo esc_html($H['blog_kicker']); ?></span>
            <h2><?php echo esc_html(ya_t('latest')); ?></h2>
            <p><?php echo esc_html(ya_t('latest_intro')); ?></p>
        </div>

        <div class="ya-post-grid">
            <?php while ($posts_query->have_posts()): $posts_query->the_post(); ?>
                <article class="ya-post-card reveal">
                    <?php if (has_post_thumbnail()): ?>
                        <a class="ya-post-image" href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('large'); ?><span></span>
                        </a>
                    <?php endif; ?>
                    <div class="ya-post-body">
                        <small><?php echo esc_html(get_the_date()); ?></small>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 22)); ?></p>
                        <a class="ya-text-link" href="<?php the_permalink(); ?>">
                            <?php echo esc_html(ya_t('readmore')); ?>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<?php wp_reset_postdata(); endif; ?>

<section class="ya-cta ya-home-final-cta">
    <div class="ya-shell ya-cta-in reveal">
        <div>
            <span class="ya-kicker"><?php echo esc_html($H['cta_kicker']); ?></span>
            <h2><?php echo esc_html(ya_t('cta_title')); ?></h2>
            <p><?php echo esc_html(ya_t('cta_text')); ?></p>
        </div>

        <div class="ya-cta-actions">
            <a class="ya-btn" href="<?php echo esc_url($quote_url); ?>">
                <?php echo esc_html(ya_t('quote')); ?>
                <i class="fa-solid fa-arrow-right"></i>
            </a>
            <a class="ya-btn ya-btn-outline" href="<?php echo esc_url($contact_url); ?>">
                <?php echo esc_html(ya_t('contact')); ?>
            </a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
