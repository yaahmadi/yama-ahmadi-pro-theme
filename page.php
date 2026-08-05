<?php
/**
 * Yama Ahmadi Pro — Fully Multilingual Inner Pages
 * French / English / German
 */

defined('ABSPATH') || exit;

get_header();

while (have_posts()) :
    the_post();

    $lang  = ya_lang();
    $slug  = sanitize_title(get_post_field('post_name'));
    $title = get_the_title();

    $phone = get_theme_mod('ya_phone', '+33 7 84 20 31 50');
    $email = get_theme_mod('ya_email', 'support@yamaahmadi.fr');
    $hours = get_theme_mod('ya_hours', 'Lun – Ven : 08:00 – 18:00');
    $area  = get_theme_mod('ya_location', 'France');

    $title_key = sanitize_title($title);

    $canonical_pages = [
        'a-propos' => ['a-propos', 'about', 'about-us'],
        'services' => ['services', 'service', 'it-services'],
        'solutions' => ['solutions', 'solution', 'it-solutions'],
        'projets' => ['projets', 'projects', 'experiences', 'experience'],
        'contact' => ['contact', 'contact-us'],
        'demander-un-devis' => [
            'demander-un-devis',
            'demande-de-devis',
            'request-a-quote',
            'request-quote',
            'quote',
        ],
    ];

    $template_slug = '';

    foreach ($canonical_pages as $canonical => $aliases) {
        foreach ($aliases as $alias) {
            if (
                $slug === $alias ||
                $title_key === $alias ||
                str_starts_with($slug, $alias . '-') ||
                str_starts_with($title_key, $alias . '-')
            ) {
                $template_slug = $canonical;
                break 2;
            }
        }
    }

    $T = [
        'fr' => [
            'hero' => [
                'a-propos' => ['À PROPOS', 'Une expertise informatique fiable, construite sur le terrain.', 'Support utilisateurs, réseaux, Microsoft 365, cybersécurité et interventions techniques avec une approche professionnelle, claire et orientée résultat.', 'fa-user-gear'],
                'services' => ['SERVICES', 'Des services informatiques professionnels pour votre entreprise.', 'Support L1/L2, réseaux, Microsoft 365, cybersécurité, infrastructure et interventions terrain pour maintenir vos opérations fiables et disponibles.', 'fa-layer-group'],
                'solutions' => ['SOLUTIONS', 'Des solutions IT conçues pour vos opérations quotidiennes.', 'Environnement de travail moderne, réseaux sécurisés, infrastructure et services terrain adaptés aux besoins des entreprises modernes.', 'fa-diagram-project'],
                'projets' => ['EXPÉRIENCES', 'Une expérience terrain dans des environnements IT exigeants.', 'Support, infrastructure, réseau et déploiement réalisés dans différents environnements professionnels et industriels.', 'fa-briefcase'],
                'contact' => ['CONTACT', 'Parlons de votre besoin informatique.', 'Présentez votre environnement, votre incident ou votre projet afin de recevoir une réponse claire et adaptée.', 'fa-comments'],
                'demander-un-devis' => ['DEMANDE DE DEVIS', 'Préparons votre intervention IT.', 'Indiquez le contexte, le lieu, le périmètre et vos contraintes afin de faciliter une évaluation précise.', 'fa-file-signature'],
            ],
            'buttons' => [
                'contact_me' => 'Me contacter',
                'view_services' => 'Voir les services',
                'quote' => 'Demander un devis',
                'contact' => 'Nous contacter',
                'read_article' => 'Lire l’article',
            ],
            'badges' => ['Professionnel', 'France', 'IT & sécurité'],
            'services_intro' => [
                'kicker' => 'SERVICES INFORMATIQUES',
                'title' => 'Des services IT professionnels pour vos opérations quotidiennes',
                'text' => 'Support utilisateurs, réseaux, cybersécurité, Microsoft 365, infrastructure et accompagnement technique avec une approche structurée, claire et orientée résultat.',
            ],
            'services' => [
                ['support','headset','Support informatique','Assistance L1/L2 sur site et à distance pour utilisateurs, postes, logiciels, imprimantes et incidents courants.',['Support utilisateurs','Diagnostic d’incidents','Windows & macOS','Imprimantes & périphériques']],
                ['network','network-wired','Réseaux & Wi-Fi','Installation, diagnostic et optimisation des réseaux professionnels, Wi-Fi, switches, VLAN, DNS et connectivité.',['Wi-Fi professionnel','Switches & VLAN','DNS & connectivité','Diagnostic réseau']],
                ['security','shield-halved','Cybersécurité','Protection des comptes, postes et accès avec des pratiques adaptées aux environnements professionnels.',['Sécurisation des comptes','Protection des postes','Gestion des accès','Bonnes pratiques']],
                ['cloud','cloud','Microsoft 365 & Cloud','Administration et accompagnement Microsoft 365 pour améliorer la collaboration, la mobilité et la continuité de service.',['Teams & OneDrive','Exchange','Comptes & licences','Migrations']],
                ['infra','server','Infrastructure IT','Déploiement, maintenance et support des postes, serveurs, racks, périphériques et équipements d’entreprise.',['Postes & serveurs','Rack & périphériques','Déploiements','Maintenance']],
                ['consult','lightbulb','Conseil & accompagnement','Audit, recommandations et accompagnement technique pour améliorer la fiabilité et la performance de votre environnement IT.',['Audit IT','Recommandations','Optimisation','Accompagnement']],
            ],
            'service_benefits' => [
                'kicker' => 'POURQUOI NOUS CHOISIR',
                'title' => 'Une intervention technique claire, structurée et professionnelle',
                'text' => 'Chaque mission est préparée avec les bonnes informations, exécutée avec méthode et validée avant clôture.',
                'steps' => [
                    ['01','Qualification','Compréhension du besoin, du site, des contraintes et du niveau de priorité.'],
                    ['02','Préparation','Vérification des accès, équipements, prérequis et informations techniques.'],
                    ['03','Intervention','Exécution des actions prévues avec méthode et communication pendant la mission.'],
                    ['04','Validation','Tests, vérification du résultat et compte rendu avant clôture.'],
                ],
            ],
            'service_cta' => ['BESOIN D’UNE INTERVENTION ?','Décrivez votre besoin et recevez une réponse claire','Indiquez le contexte, le lieu, l’équipement concerné et le niveau d’urgence afin de faciliter la préparation.'],
            'solutions_intro' => ['SOLUTIONS PROFESSIONNELLES','Une infrastructure IT plus stable, sécurisée et adaptée à vos opérations','Des solutions structurées autour des besoins quotidiens des entreprises : collaboration, sécurité, réseau, postes de travail, infrastructure, exploitation et interventions terrain.'],
            'solutions' => [
                ['01','Environnement de travail moderne','Centralisez la collaboration, les identités et les données avec Microsoft 365 afin de simplifier le travail quotidien et améliorer la continuité de service.','fa-cloud','Microsoft 365 • Teams • OneDrive • Exchange'],
                ['02','Réseau sécurisé','Améliorez la stabilité et la sécurité de votre réseau grâce à une architecture mieux segmentée, un Wi-Fi professionnel et une connectivité maîtrisée.','fa-shield-halved','Wi-Fi • VLAN • Firewall • VPN'],
                ['03','Opérations IT','Standardisez le support utilisateurs, les postes, les déploiements et la maintenance afin de réduire les incidents récurrents et gagner en efficacité.','fa-gears','L1/L2 • Équipements • Déploiement • Support'],
                ['04','Services terrain','Bénéficiez d’un support technique sur site pour les interventions, remplacements matériels, remote hands, rack, câblage et assistance multi-sites.','fa-location-crosshairs','Sur site • Remote hands • Infrastructure'],
            ],
            'workplace' => [
                'kicker'=>'MICROSOFT 365 & CLOUD',
                'title'=>'Un environnement de travail moderne pour vos équipes',
                'text'=>'Microsoft 365 permet de centraliser la messagerie, la collaboration, le partage documentaire et les identités. L’objectif est d’obtenir un environnement simple à utiliser, plus sécurisé et plus facile à administrer.',
                'features'=>['Microsoft Teams et collaboration','OneDrive et partage documentaire','Exchange et messagerie professionnelle','Comptes, licences et identités','Migration et accompagnement utilisateurs','Sécurisation des accès et bonnes pratiques'],
                'panel'=>'Une plateforme adaptée aux entreprises qui souhaitent centraliser communication, fichiers et collaboration.',
                'link'=>'Parler de votre environnement',
            ],
            'network' => [
                'kicker'=>'RÉSEAU & SÉCURITÉ',
                'title'=>'Une connectivité fiable et mieux protégée',
                'text'=>'Une infrastructure réseau bien structurée améliore la disponibilité, la sécurité et l’expérience utilisateur. Diagnostic, segmentation, Wi-Fi, firewall et optimisation peuvent être adaptés à votre environnement.',
                'stats'=>[['Wi-Fi','Couverture & stabilité'],['VLAN','Segmentation réseau'],['VPN','Accès distant sécurisé'],['24/7','Continuité à préparer']],
            ],
            'operations' => [
                'kicker'=>'OPÉRATIONS & SERVICES TERRAIN',
                'title'=>'Du support quotidien jusqu’aux interventions sur site',
                'text'=>'Des services adaptés aux environnements multi-sites, industriels, logistiques, commerces et PME qui ont besoin d’une assistance technique fiable et documentée.',
                'items'=>[
                    ['fa-headset','Support utilisateurs','Assistance L1/L2, incidents, postes, logiciels et périphériques.'],
                    ['fa-laptop','Déploiement de postes','Préparation, configuration, remplacement et mise en service.'],
                    ['fa-server','Remote hands','Assistance physique pour équipes IT distantes et opérations infrastructure.'],
                    ['fa-network-wired','Infrastructure réseau','Switches, câblage, rack, équipements et diagnostic de connectivité.'],
                    ['fa-screwdriver-wrench','Remplacement matériel','Interventions terrain pour équipements, composants et périphériques.'],
                    ['fa-file-lines','Compte rendu','Validation, tests, documentation et remontée claire des résultats.'],
                ],
            ],
            'solution_process'=>[
                'kicker'=>'MÉTHODE',
                'title'=>'Une solution adaptée commence par une bonne compréhension du besoin',
                'steps'=>[
                    ['01','Analyser','Comprendre les utilisateurs, les équipements, l’infrastructure et les contraintes.'],
                    ['02','Concevoir','Définir une approche réaliste, claire et adaptée au contexte opérationnel.'],
                    ['03','Déployer','Mettre en œuvre les actions avec méthode, tests et coordination.'],
                    ['04','Améliorer','Documenter, recommander les prochaines actions et réduire les incidents récurrents.'],
                ],
            ],
            'about' => [
                'kicker'=>'EXPERTISE & TERRAIN',
                'title'=>'Un support informatique professionnel, construit sur l’expérience terrain.',
                'p1'=>'Basé à Poitiers, Yama Ahmadi accompagne les entreprises pour le support utilisateurs, les réseaux, Microsoft 365, la cybersécurité, l’infrastructure et les interventions techniques sur site.',
                'p2'=>'Chaque mission repose sur une méthode simple : comprendre le besoin, préparer l’intervention, agir avec précision, tester le résultat et communiquer clairement avec le client ou l’équipe IT distante.',
                'points'=>['Support L1/L2 sur site et à distance','Réseaux, Wi-Fi, postes et infrastructure','Microsoft 365 et environnements professionnels','Interventions terrain dans toute la France'],
                'status'=>'Disponible pour interventions',
                'meta'=>'Support IT • Réseau • Infrastructure',
                'values_intro'=>['NOTRE ENGAGEMENT','Une prestation claire, fiable et orientée résultat','Des principes simples appliqués à chaque intervention, du premier échange jusqu’à la validation technique.'],
                'values'=>[
                    ['fa-bolt','Réactivité','Une prise en charge rapide selon la disponibilité, le contexte et le niveau de priorité.'],
                    ['fa-list-check','Méthode','Qualification, préparation, intervention, tests et compte rendu pour garder une mission structurée.'],
                    ['fa-shield-halved','Fiabilité','Des actions orientées stabilité, sécurité et continuité des opérations informatiques.'],
                    ['fa-comments','Communication','Des échanges clairs en français et en anglais avec les utilisateurs, clients et équipes techniques.'],
                ],
                'cap_kicker'=>'CAPACITÉS TECHNIQUES',
                'cap_title'=>'Du poste utilisateur jusqu’à l’infrastructure réseau.',
                'cap_text'=>'Une couverture technique adaptée aux PME, sites industriels, commerces, environnements logistiques et missions de field services.',
                'stats'=>[['L1/L2','Support utilisateurs'],['FR','Interventions en France'],['Sur site','Field services'],['Remote','Assistance à distance']],
                'process_intro'=>['MÉTHODE D’INTERVENTION','Une mission maîtrisée de bout en bout'],
                'process'=>[
                    ['01','Comprendre','Identifier le besoin, l’environnement, les contraintes et le niveau d’urgence.'],
                    ['02','Préparer','Valider les accès, équipements, prérequis et informations nécessaires.'],
                    ['03','Intervenir','Exécuter les actions prévues avec méthode et coordination technique.'],
                    ['04','Valider','Tester, documenter le résultat et confirmer la remise en service.'],
                ],
            ],
            'projects_intro'=>['EXPÉRIENCE TERRAIN','Missions dans différents environnements professionnels','Support utilisateurs, déploiement, réseau et infrastructure dans des environnements industriels, logistiques et d’entreprise.'],
            'projects'=>[
                ['Marelli','Châtellerault, France','Support informatique L1/L2, Microsoft 365, postes et environnement industriel.','IT INDUSTRIEL'],
                ['Action Logistics','Angers / Moissy','Support terrain, réseau, préparation de postes et opérations logistiques.','LOGISTIQUE'],
                ['HCL Technologies','IT entreprise','Résolution d’incidents et assistance utilisateurs.','IT ENTREPRISE'],
                ['TECEZE','Services terrain','Diagnostic, remplacement matériel et support infrastructure.','FIELD SERVICES'],
                ['Cognizant','IT entreprise','Maintenance des postes, utilisateurs et assistance technique.','IT ENTREPRISE'],
                ['Wipro','IT professionnel','Support utilisateurs, incidents et assistance terrain.','IT PROFESSIONNEL'],
            ],
            'projects_disclaimer'=>'Ces références décrivent des expériences professionnelles. Elles ne constituent pas nécessairement une approbation officielle ou un partenariat commercial public.',
            'contact' => [
                'direct'=>'CONTACT DIRECT',
                'quote_title'=>'Préparez votre demande',
                'contact_title'=>'Nous sommes à votre écoute',
                'intro'=>'Plus vous partagez de contexte, plus la réponse peut être précise.',
                'phone'=>'Téléphone','email'=>'E-mail','area'=>'Zone','availability'=>'Disponibilité',
                'privacy'=>'Les informations envoyées sont utilisées uniquement pour traiter votre demande.',
                'message'=>'MESSAGE','quote'=>'DEMANDE DE DEVIS',
                'send'=>'Envoyez votre demande','describe'=>'Décrivez votre besoin',
            ],
            'common_cta'=>['PROCHAINE ÉTAPE','Besoin d’un environnement IT plus fiable ?','Parlons du contexte et identifions ensemble la prochaine action utile.'],
            'standard_kicker'=>'YAMA AHMADI • SERVICES INFORMATIQUES',
        ],
        'en' => [
            'hero' => [
                'a-propos' => ['ABOUT', 'Reliable IT expertise built through field experience.', 'User support, networks, Microsoft 365, cybersecurity and technical interventions delivered with a clear, professional and results-focused approach.', 'fa-user-gear'],
                'services' => ['SERVICES', 'Professional IT services for your business.', 'L1/L2 support, networks, Microsoft 365, cybersecurity, infrastructure and field services to keep your operations reliable and available.', 'fa-layer-group'],
                'solutions' => ['SOLUTIONS', 'IT solutions designed for daily operations.', 'Modern workplace, secure networks, infrastructure and field services adapted to modern business needs.', 'fa-diagram-project'],
                'projets' => ['EXPERIENCE', 'Field experience in demanding IT environments.', 'Support, infrastructure, networking and deployments delivered across professional and industrial environments.', 'fa-briefcase'],
                'contact' => ['CONTACT', 'Let’s discuss your IT needs.', 'Describe your environment, incident or project to receive a clear and relevant response.', 'fa-comments'],
                'demander-un-devis' => ['REQUEST A QUOTE', 'Let’s prepare your IT intervention.', 'Provide the context, location, scope and constraints to support an accurate assessment.', 'fa-file-signature'],
            ],
            'buttons' => ['contact_me'=>'Contact me','view_services'=>'View services','quote'=>'Request a quote','contact'=>'Contact us','read_article'=>'Read the article'],
            'badges' => ['Professional', 'France', 'IT & security'],
            'services_intro' => ['kicker'=>'IT SERVICES','title'=>'Professional IT services for your daily operations','text'=>'User support, networking, cybersecurity, Microsoft 365, infrastructure and technical guidance delivered through a structured, clear and results-focused approach.'],
            'services' => [
                ['support','headset','IT Support','On-site and remote L1/L2 assistance for users, computers, software, printers and common incidents.',['User support','Incident diagnosis','Windows & macOS','Printers & peripherals']],
                ['network','network-wired','Networks & Wi-Fi','Installation, diagnosis and optimization of business networks, Wi-Fi, switches, VLANs, DNS and connectivity.',['Business Wi-Fi','Switches & VLANs','DNS & connectivity','Network diagnosis']],
                ['security','shield-halved','Cybersecurity','Protection for accounts, endpoints and access using practices suited to professional environments.',['Account security','Endpoint protection','Access management','Best practices']],
                ['cloud','cloud','Microsoft 365 & Cloud','Administration and support for Microsoft 365 to improve collaboration, mobility and service continuity.',['Teams & OneDrive','Exchange','Accounts & licenses','Migrations']],
                ['infra','server','IT Infrastructure','Deployment, maintenance and support for computers, servers, racks, peripherals and business equipment.',['Computers & servers','Racks & peripherals','Deployments','Maintenance']],
                ['consult','lightbulb','Consulting & Guidance','Audits, recommendations and technical guidance to improve the reliability and performance of your IT environment.',['IT audit','Recommendations','Optimization','Guidance']],
            ],
            'service_benefits' => ['kicker'=>'WHY CHOOSE US','title'=>'A clear, structured and professional technical intervention','text'=>'Every assignment is prepared with the right information, carried out methodically and validated before closure.','steps'=>[
                ['01','Qualification','Understanding the need, site, constraints and priority level.'],
                ['02','Preparation','Checking access, equipment, prerequisites and technical information.'],
                ['03','Intervention','Executing the planned actions with method and communication.'],
                ['04','Validation','Testing, confirming the result and reporting before closure.'],
            ]],
            'service_cta'=>['NEED AN INTERVENTION?','Describe your needs and receive a clear response','Provide the context, location, equipment and urgency level to support proper preparation.'],
            'solutions_intro'=>['PROFESSIONAL SOLUTIONS','A more stable, secure IT infrastructure aligned with your operations','Solutions structured around daily business needs: collaboration, security, networking, workstations, infrastructure, operations and field services.'],
            'solutions'=>[
                ['01','Modern workplace','Centralize collaboration, identities and data with Microsoft 365 to simplify daily work and improve service continuity.','fa-cloud','Microsoft 365 • Teams • OneDrive • Exchange'],
                ['02','Secure network','Improve network stability and security through better segmentation, professional Wi-Fi and controlled connectivity.','fa-shield-halved','Wi-Fi • VLAN • Firewall • VPN'],
                ['03','IT operations','Standardize user support, devices, deployments and maintenance to reduce recurring incidents and improve efficiency.','fa-gears','L1/L2 • Equipment • Deployment • Support'],
                ['04','Field services','Get on-site technical support for interventions, hardware replacements, remote hands, racks, cabling and multi-site assistance.','fa-location-crosshairs','On-site • Remote hands • Infrastructure'],
            ],
            'workplace'=>['kicker'=>'MICROSOFT 365 & CLOUD','title'=>'A modern workplace for your teams','text'=>'Microsoft 365 centralizes email, collaboration, document sharing and identities to create an environment that is easier to use, more secure and easier to administer.','features'=>['Microsoft Teams and collaboration','OneDrive and document sharing','Exchange and business email','Accounts, licenses and identities','Migration and user guidance','Secure access and best practices'],'panel'=>'A platform for businesses that want to centralize communication, files and collaboration.','link'=>'Discuss your environment'],
            'network'=>['kicker'=>'NETWORK & SECURITY','title'=>'Reliable and better-protected connectivity','text'=>'A well-structured network improves availability, security and user experience. Diagnosis, segmentation, Wi-Fi, firewall and optimization can be adapted to your environment.','stats'=>[['Wi-Fi','Coverage & stability'],['VLAN','Network segmentation'],['VPN','Secure remote access'],['24/7','Continuity planning']]],
            'operations'=>['kicker'=>'OPERATIONS & FIELD SERVICES','title'=>'From daily support to on-site interventions','text'=>'Services suited to multi-site, industrial, logistics, retail and SME environments that need reliable and documented technical assistance.','items'=>[
                ['fa-headset','User support','L1/L2 assistance, incidents, computers, software and peripherals.'],
                ['fa-laptop','Computer deployment','Preparation, configuration, replacement and commissioning.'],
                ['fa-server','Remote hands','Physical assistance for remote IT teams and infrastructure operations.'],
                ['fa-network-wired','Network infrastructure','Switches, cabling, racks, equipment and connectivity diagnosis.'],
                ['fa-screwdriver-wrench','Hardware replacement','Field interventions for equipment, components and peripherals.'],
                ['fa-file-lines','Reporting','Validation, testing, documentation and clear result reporting.'],
            ]],
            'solution_process'=>['kicker'=>'METHOD','title'=>'The right solution starts with understanding the need','steps'=>[
                ['01','Analyze','Understand users, equipment, infrastructure and constraints.'],
                ['02','Design','Define a realistic and clear approach suited to the operational context.'],
                ['03','Deploy','Implement the actions with method, testing and coordination.'],
                ['04','Improve','Document, recommend next actions and reduce recurring incidents.'],
            ]],
            'about'=>[
                'kicker'=>'EXPERTISE & FIELD EXPERIENCE','title'=>'Professional IT support built through field experience.','p1'=>'Based in Poitiers, Yama Ahmadi supports businesses with user support, networking, Microsoft 365, cybersecurity, infrastructure and on-site technical interventions.','p2'=>'Every assignment follows a simple method: understand the need, prepare the intervention, act precisely, test the result and communicate clearly with the client or remote IT team.','points'=>['On-site and remote L1/L2 support','Networks, Wi-Fi, computers and infrastructure','Microsoft 365 and business environments','Field interventions across France'],'status'=>'Available for interventions','meta'=>'IT Support • Network • Infrastructure','values_intro'=>['OUR COMMITMENT','A clear, reliable and results-focused service','Simple principles applied to every intervention, from the first exchange through technical validation.'],'values'=>[
                    ['fa-bolt','Responsiveness','Fast handling based on availability, context and priority level.'],
                    ['fa-list-check','Method','Qualification, preparation, intervention, testing and reporting for a structured assignment.'],
                    ['fa-shield-halved','Reliability','Actions focused on stability, security and IT operational continuity.'],
                    ['fa-comments','Communication','Clear communication in French and English with users, clients and technical teams.'],
                ],'cap_kicker'=>'TECHNICAL CAPABILITIES','cap_title'=>'From user devices to network infrastructure.','cap_text'=>'Technical coverage suited to SMEs, industrial sites, retail, logistics environments and field-service assignments.','stats'=>[['L1/L2','User support'],['FR','Coverage in France'],['On-site','Field services'],['Remote','Remote assistance']],'process_intro'=>['INTERVENTION METHOD','An assignment controlled from start to finish'],'process'=>[
                    ['01','Understand','Identify the need, environment, constraints and urgency level.'],
                    ['02','Prepare','Validate access, equipment, prerequisites and required information.'],
                    ['03','Intervene','Execute the planned actions with method and technical coordination.'],
                    ['04','Validate','Test, document the result and confirm service restoration.'],
                ]],
            'projects_intro'=>['FIELD EXPERIENCE','Assignments across different professional environments','User support, deployments, networking and infrastructure in industrial, logistics and enterprise environments.'],
            'projects'=>[
                ['Marelli','Châtellerault, France','L1/L2 IT support, Microsoft 365, computers and industrial environment.','INDUSTRIAL IT'],
                ['Action Logistics','Angers / Moissy','Field support, networking, computer preparation and logistics operations.','LOGISTICS'],
                ['HCL Technologies','Enterprise IT','Incident resolution and user assistance.','ENTERPRISE IT'],
                ['TECEZE','Field services','Diagnosis, hardware replacement and infrastructure support.','FIELD SERVICES'],
                ['Cognizant','Enterprise IT','Computer maintenance, user support and technical assistance.','ENTERPRISE IT'],
                ['Wipro','Professional IT','User support, incidents and field assistance.','PROFESSIONAL IT'],
            ],
            'projects_disclaimer'=>'These references describe professional experience. They do not necessarily constitute official endorsement or a public commercial partnership.',
            'contact'=>['direct'=>'DIRECT CONTACT','quote_title'=>'Prepare your request','contact_title'=>'We are ready to help','intro'=>'The more context you provide, the more precise the response can be.','phone'=>'Phone','email'=>'Email','area'=>'Area','availability'=>'Availability','privacy'=>'The information submitted is used only to process your request.','message'=>'MESSAGE','quote'=>'REQUEST A QUOTE','send'=>'Send your request','describe'=>'Describe your needs'],
            'common_cta'=>['NEXT STEP','Need a more reliable IT environment?','Let’s discuss the context and identify the next useful action together.'],
            'standard_kicker'=>'YAMA AHMADI • IT SERVICES',
        ],
        'de' => [
            'hero' => [
                'a-propos' => ['ÜBER UNS', 'Zuverlässige IT-Expertise aus praktischer Erfahrung.', 'Benutzersupport, Netzwerke, Microsoft 365, Cybersicherheit und technische Einsätze mit einem klaren, professionellen und ergebnisorientierten Ansatz.', 'fa-user-gear'],
                'services' => ['SERVICES', 'Professionelle IT-Services für Ihr Unternehmen.', 'L1/L2-Support, Netzwerke, Microsoft 365, Cybersicherheit, Infrastruktur und Vor-Ort-Services für zuverlässige und verfügbare Abläufe.', 'fa-layer-group'],
                'solutions' => ['LÖSUNGEN', 'IT-Lösungen für den täglichen Betrieb.', 'Moderner Arbeitsplatz, sichere Netzwerke, Infrastruktur und Vor-Ort-Services für moderne Unternehmen.', 'fa-diagram-project'],
                'projets' => ['ERFAHRUNG', 'Praxis in anspruchsvollen IT-Umgebungen.', 'Support, Infrastruktur, Netzwerk und Bereitstellungen in professionellen und industriellen Umgebungen.', 'fa-briefcase'],
                'contact' => ['KONTAKT', 'Sprechen wir über Ihren IT-Bedarf.', 'Beschreiben Sie Ihre Umgebung, Störung oder Ihr Projekt für eine klare und passende Antwort.', 'fa-comments'],
                'demander-un-devis' => ['ANGEBOT ANFORDERN', 'Bereiten wir Ihren IT-Einsatz vor.', 'Geben Sie Kontext, Standort, Umfang und Einschränkungen für eine präzise Bewertung an.', 'fa-file-signature'],
            ],
            'buttons'=>['contact_me'=>'Kontakt aufnehmen','view_services'=>'Services ansehen','quote'=>'Angebot anfordern','contact'=>'Kontakt','read_article'=>'Artikel lesen'],
            'badges'=>['Professionell','Frankreich','IT & Sicherheit'],
            'services_intro'=>['kicker'=>'IT-SERVICES','title'=>'Professionelle IT-Services für den täglichen Betrieb','text'=>'Benutzersupport, Netzwerke, Cybersicherheit, Microsoft 365, Infrastruktur und technische Begleitung mit einem strukturierten, klaren und ergebnisorientierten Ansatz.'],
            'services'=>[
                ['support','headset','IT-Support','L1/L2-Unterstützung vor Ort und remote für Benutzer, Computer, Software, Drucker und häufige Störungen.',['Benutzersupport','Störungsdiagnose','Windows & macOS','Drucker & Peripherie']],
                ['network','network-wired','Netzwerke & Wi-Fi','Installation, Diagnose und Optimierung von Unternehmensnetzwerken, Wi-Fi, Switches, VLANs, DNS und Konnektivität.',['Business Wi-Fi','Switches & VLANs','DNS & Konnektivität','Netzwerkdiagnose']],
                ['security','shield-halved','Cybersicherheit','Schutz von Konten, Endgeräten und Zugriffen mit geeigneten Maßnahmen für professionelle Umgebungen.',['Kontosicherheit','Endgeräteschutz','Zugriffsverwaltung','Best Practices']],
                ['cloud','cloud','Microsoft 365 & Cloud','Administration und Begleitung von Microsoft 365 für bessere Zusammenarbeit, Mobilität und Servicekontinuität.',['Teams & OneDrive','Exchange','Konten & Lizenzen','Migrationen']],
                ['infra','server','IT-Infrastruktur','Bereitstellung, Wartung und Support für Computer, Server, Racks, Peripherie und Unternehmensausstattung.',['Computer & Server','Racks & Peripherie','Bereitstellungen','Wartung']],
                ['consult','lightbulb','Beratung & Begleitung','Audits, Empfehlungen und technische Begleitung zur Verbesserung von Zuverlässigkeit und Leistung Ihrer IT-Umgebung.',['IT-Audit','Empfehlungen','Optimierung','Begleitung']],
            ],
            'service_benefits'=>['kicker'=>'WARUM WIR','title'=>'Ein klarer, strukturierter und professioneller technischer Einsatz','text'=>'Jeder Auftrag wird mit den richtigen Informationen vorbereitet, methodisch ausgeführt und vor Abschluss validiert.','steps'=>[
                ['01','Qualifizierung','Verständnis von Bedarf, Standort, Einschränkungen und Priorität.'],
                ['02','Vorbereitung','Prüfung von Zugängen, Geräten, Voraussetzungen und technischen Informationen.'],
                ['03','Einsatz','Durchführung der geplanten Maßnahmen mit Methode und Kommunikation.'],
                ['04','Validierung','Tests, Ergebnisprüfung und Bericht vor Abschluss.'],
            ]],
            'service_cta'=>['BENÖTIGEN SIE EINEN EINSATZ?','Beschreiben Sie Ihren Bedarf und erhalten Sie eine klare Antwort','Geben Sie Kontext, Standort, betroffenes Gerät und Dringlichkeit für eine gute Vorbereitung an.'],
            'solutions_intro'=>['PROFESSIONELLE LÖSUNGEN','Eine stabilere und sicherere IT-Infrastruktur für Ihre Abläufe','Lösungen für tägliche Unternehmensanforderungen: Zusammenarbeit, Sicherheit, Netzwerk, Arbeitsplätze, Infrastruktur, Betrieb und Vor-Ort-Services.'],
            'solutions'=>[
                ['01','Moderner Arbeitsplatz','Zentralisieren Sie Zusammenarbeit, Identitäten und Daten mit Microsoft 365, um den Arbeitsalltag zu vereinfachen und die Kontinuität zu verbessern.','fa-cloud','Microsoft 365 • Teams • OneDrive • Exchange'],
                ['02','Sicheres Netzwerk','Verbessern Sie Stabilität und Sicherheit durch bessere Segmentierung, professionelles Wi-Fi und kontrollierte Konnektivität.','fa-shield-halved','Wi-Fi • VLAN • Firewall • VPN'],
                ['03','IT-Betrieb','Standardisieren Sie Benutzersupport, Geräte, Bereitstellungen und Wartung, um wiederkehrende Störungen zu reduzieren.','fa-gears','L1/L2 • Geräte • Bereitstellung • Support'],
                ['04','Vor-Ort-Services','Technischer Support vor Ort für Einsätze, Hardwaretausch, Remote Hands, Racks, Verkabelung und Multi-Site-Unterstützung.','fa-location-crosshairs','Vor Ort • Remote Hands • Infrastruktur'],
            ],
            'workplace'=>['kicker'=>'MICROSOFT 365 & CLOUD','title'=>'Ein moderner Arbeitsplatz für Ihre Teams','text'=>'Microsoft 365 zentralisiert E-Mail, Zusammenarbeit, Dokumentenaustausch und Identitäten für eine einfachere, sicherere und besser administrierbare Umgebung.','features'=>['Microsoft Teams und Zusammenarbeit','OneDrive und Dokumentenaustausch','Exchange und Business-E-Mail','Konten, Lizenzen und Identitäten','Migration und Benutzerbegleitung','Sichere Zugriffe und Best Practices'],'panel'=>'Eine Plattform für Unternehmen, die Kommunikation, Dateien und Zusammenarbeit zentralisieren möchten.','link'=>'Über Ihre Umgebung sprechen'],
            'network'=>['kicker'=>'NETZWERK & SICHERHEIT','title'=>'Zuverlässige und besser geschützte Konnektivität','text'=>'Eine gut strukturierte Netzwerkumgebung verbessert Verfügbarkeit, Sicherheit und Benutzererfahrung. Diagnose, Segmentierung, Wi-Fi, Firewall und Optimierung können angepasst werden.','stats'=>[['Wi-Fi','Abdeckung & Stabilität'],['VLAN','Netzwerksegmentierung'],['VPN','Sicherer Fernzugriff'],['24/7','Kontinuitätsplanung']]],
            'operations'=>['kicker'=>'BETRIEB & VOR-ORT-SERVICES','title'=>'Vom täglichen Support bis zum Vor-Ort-Einsatz','text'=>'Services für Multi-Site-, Industrie-, Logistik-, Handel- und KMU-Umgebungen mit Bedarf an zuverlässiger und dokumentierter technischer Unterstützung.','items'=>[
                ['fa-headset','Benutzersupport','L1/L2-Unterstützung, Störungen, Computer, Software und Peripherie.'],
                ['fa-laptop','Computerbereitstellung','Vorbereitung, Konfiguration, Austausch und Inbetriebnahme.'],
                ['fa-server','Remote Hands','Physische Unterstützung für entfernte IT-Teams und Infrastrukturarbeiten.'],
                ['fa-network-wired','Netzwerkinfrastruktur','Switches, Verkabelung, Racks, Geräte und Konnektivitätsdiagnose.'],
                ['fa-screwdriver-wrench','Hardwaretausch','Vor-Ort-Einsätze für Geräte, Komponenten und Peripherie.'],
                ['fa-file-lines','Bericht','Validierung, Tests, Dokumentation und klare Ergebnisrückmeldung.'],
            ]],
            'solution_process'=>['kicker'=>'METHODE','title'=>'Die passende Lösung beginnt mit dem Verständnis des Bedarfs','steps'=>[
                ['01','Analysieren','Benutzer, Geräte, Infrastruktur und Einschränkungen verstehen.'],
                ['02','Konzipieren','Einen realistischen, klaren Ansatz für den Betriebskontext definieren.'],
                ['03','Bereitstellen','Maßnahmen methodisch, getestet und koordiniert umsetzen.'],
                ['04','Verbessern','Dokumentieren, nächste Schritte empfehlen und wiederkehrende Störungen reduzieren.'],
            ]],
            'about'=>[
                'kicker'=>'EXPERTISE & PRAXIS','title'=>'Professioneller IT-Support aus praktischer Erfahrung.','p1'=>'Yama Ahmadi mit Sitz in Poitiers unterstützt Unternehmen bei Benutzersupport, Netzwerken, Microsoft 365, Cybersicherheit, Infrastruktur und technischen Vor-Ort-Einsätzen.','p2'=>'Jeder Auftrag folgt einer einfachen Methode: Bedarf verstehen, Einsatz vorbereiten, präzise handeln, Ergebnis testen und klar mit Kunde oder entferntem IT-Team kommunizieren.','points'=>['L1/L2-Support vor Ort und remote','Netzwerke, Wi-Fi, Computer und Infrastruktur','Microsoft 365 und Unternehmensumgebungen','Vor-Ort-Einsätze in ganz Frankreich'],'status'=>'Verfügbar für Einsätze','meta'=>'IT-Support • Netzwerk • Infrastruktur','values_intro'=>['UNSER VERSPRECHEN','Eine klare, zuverlässige und ergebnisorientierte Leistung','Einfache Grundsätze für jeden Einsatz, vom ersten Austausch bis zur technischen Validierung.'],'values'=>[
                    ['fa-bolt','Reaktionsfähigkeit','Schnelle Bearbeitung je nach Verfügbarkeit, Kontext und Priorität.'],
                    ['fa-list-check','Methode','Qualifizierung, Vorbereitung, Einsatz, Tests und Bericht für einen strukturierten Auftrag.'],
                    ['fa-shield-halved','Zuverlässigkeit','Maßnahmen mit Fokus auf Stabilität, Sicherheit und Betriebskontinuität.'],
                    ['fa-comments','Kommunikation','Klare Kommunikation auf Französisch und Englisch mit Benutzern, Kunden und technischen Teams.'],
                ],'cap_kicker'=>'TECHNISCHE FÄHIGKEITEN','cap_title'=>'Vom Benutzergerät bis zur Netzwerkinfrastruktur.','cap_text'=>'Technische Abdeckung für KMU, Industrie, Handel, Logistik und Field-Service-Aufträge.','stats'=>[['L1/L2','Benutzersupport'],['FR','Einsätze in Frankreich'],['Vor Ort','Field Services'],['Remote','Fernunterstützung']],'process_intro'=>['EINSATZMETHODE','Ein Auftrag von Anfang bis Ende kontrolliert'],'process'=>[
                    ['01','Verstehen','Bedarf, Umgebung, Einschränkungen und Dringlichkeit identifizieren.'],
                    ['02','Vorbereiten','Zugänge, Geräte, Voraussetzungen und Informationen prüfen.'],
                    ['03','Umsetzen','Geplante Maßnahmen methodisch und koordiniert ausführen.'],
                    ['04','Validieren','Testen, dokumentieren und Wiederherstellung bestätigen.'],
                ]],
            'projects_intro'=>['PRAXISERFAHRUNG','Aufträge in unterschiedlichen professionellen Umgebungen','Benutzersupport, Bereitstellungen, Netzwerk und Infrastruktur in Industrie-, Logistik- und Unternehmensumgebungen.'],
            'projects'=>[
                ['Marelli','Châtellerault, Frankreich','L1/L2-IT-Support, Microsoft 365, Computer und Industrieumgebung.','INDUSTRIELLE IT'],
                ['Action Logistics','Angers / Moissy','Vor-Ort-Support, Netzwerk, Computervorbereitung und Logistikbetrieb.','LOGISTIK'],
                ['HCL Technologies','Unternehmens-IT','Störungsbehebung und Benutzerunterstützung.','UNTERNEHMENS-IT'],
                ['TECEZE','Vor-Ort-Services','Diagnose, Hardwaretausch und Infrastruktur-Support.','FIELD SERVICES'],
                ['Cognizant','Unternehmens-IT','Computerwartung, Benutzersupport und technische Unterstützung.','UNTERNEHMENS-IT'],
                ['Wipro','Professionelle IT','Benutzersupport, Störungen und Vor-Ort-Unterstützung.','PROFESSIONELLE IT'],
            ],
            'projects_disclaimer'=>'Diese Referenzen beschreiben berufliche Erfahrungen. Sie stellen nicht zwingend eine offizielle Empfehlung oder öffentliche Geschäftspartnerschaft dar.',
            'contact'=>['direct'=>'DIREKTER KONTAKT','quote_title'=>'Bereiten Sie Ihre Anfrage vor','contact_title'=>'Wir sind für Sie da','intro'=>'Je mehr Kontext Sie mitteilen, desto präziser kann die Antwort sein.','phone'=>'Telefon','email'=>'E-Mail','area'=>'Gebiet','availability'=>'Verfügbarkeit','privacy'=>'Die übermittelten Informationen werden nur zur Bearbeitung Ihrer Anfrage verwendet.','message'=>'NACHRICHT','quote'=>'ANGEBOT ANFORDERN','send'=>'Anfrage senden','describe'=>'Bedarf beschreiben'],
            'common_cta'=>['NÄCHSTER SCHRITT','Benötigen Sie eine zuverlässigere IT-Umgebung?','Lassen Sie uns den Kontext besprechen und gemeinsam die nächste sinnvolle Maßnahme bestimmen.'],
            'standard_kicker'=>'YAMA AHMADI • IT-SERVICES',
        ],
    ];

    $L = $T[$lang] ?? $T['fr'];

    if ($template_slug && isset($L['hero'][$template_slug])) :
        $hero = $L['hero'][$template_slug];
?>

<section class="ya-inner-hero ya-premium-inner-hero ya-universal-inner-hero ya-inner-hero-<?php echo esc_attr($template_slug); ?>">
    <div class="ya-inner-grid" aria-hidden="true"></div>
    <div class="ya-inner-orb ya-inner-orb-one" aria-hidden="true"></div>
    <div class="ya-inner-orb ya-inner-orb-two" aria-hidden="true"></div>

    <div class="ya-shell ya-inner-hero-in">
        <div class="ya-inner-copy reveal">
            <span class="ya-kicker"><?php echo esc_html($hero[0]); ?></span>
            <h1><?php echo esc_html($hero[1]); ?></h1>
            <p><?php echo esc_html($hero[2]); ?></p>

            <?php if ($template_slug === 'a-propos' || $template_slug === 'services') : ?>
                <div class="ya-inner-hero-actions">
                    <?php if ($template_slug === 'a-propos') : ?>
                        <a class="ya-btn" href="<?php echo esc_url(ya_page('contact')); ?>">
                            <?php echo esc_html($L['buttons']['contact_me']); ?>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                        <a class="ya-btn ya-btn-outline" href="<?php echo esc_url(ya_page('services')); ?>">
                            <?php echo esc_html($L['buttons']['view_services']); ?>
                        </a>
                    <?php else : ?>
                        <a class="ya-btn" href="<?php echo esc_url(ya_page('demander-un-devis')); ?>">
                            <?php echo esc_html($L['buttons']['quote']); ?>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                        <a class="ya-btn ya-btn-outline" href="<?php echo esc_url(ya_page('contact')); ?>">
                            <?php echo esc_html($L['buttons']['contact']); ?>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="ya-inner-badges">
                <span><i class="fa-solid fa-circle-check"></i><?php echo esc_html($L['badges'][0]); ?></span>
                <span><i class="fa-solid fa-location-dot"></i><?php echo esc_html($L['badges'][1]); ?></span>
                <span><i class="fa-solid fa-shield-halved"></i><?php echo esc_html($L['badges'][2]); ?></span>
            </div>
        </div>

        <div class="ya-inner-visual reveal">
            <div class="ya-inner-glow"></div>
            <div class="ya-inner-icon"><i class="fa-solid <?php echo esc_attr($hero[3]); ?>"></i></div>
            <div class="ya-inner-orbit">
                <i class="fa-solid fa-wifi"></i>
                <i class="fa-solid fa-cloud"></i>
                <i class="fa-solid fa-server"></i>
            </div>
        </div>
    </div>
</section>

<?php if ($template_slug === 'services') : ?>

<section class="ya-section ya-services-premium">
    <div class="ya-shell">
        <div class="ya-section-head reveal">
            <span class="ya-kicker"><?php echo esc_html($L['services_intro']['kicker']); ?></span>
            <h2><?php echo esc_html($L['services_intro']['title']); ?></h2>
            <p><?php echo esc_html($L['services_intro']['text']); ?></p>
        </div>

        <div class="ya-services-showcase">
            <?php
            $fallback_images = [
                'support'=>'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=1100&q=82',
                'network'=>'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=1100&q=82',
                'security'=>'https://images.unsplash.com/photo-1563013544-824ae1b704d3?auto=format&fit=crop&w=1100&q=82',
                'cloud'=>'https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&w=1100&q=82',
                'infra'=>'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=1100&q=82',
                'consult'=>'https://images.unsplash.com/photo-1521737711867-e3b97375f902?auto=format&fit=crop&w=1100&q=82',
            ];

            foreach ($L['services'] as $i => $service) :
                $service_url = function_exists('ya_service_article_url')
                    ? ya_service_article_url($service[0])
                    : ya_page('services') . '#' . $service[0];

                $service_image = function_exists('ya_service_article_image')
                    ? ya_service_article_image($service[0], $fallback_images[$service[0]])
                    : $fallback_images[$service[0]];
            ?>
                <article id="<?php echo esc_attr($service[0]); ?>" class="ya-service-showcase-card reveal" style="--delay:<?php echo esc_attr($i * 55); ?>ms">
                    <a class="ya-service-showcase-media" href="<?php echo esc_url($service_url); ?>" aria-label="<?php echo esc_attr($service[2]); ?>">
                        <img src="<?php echo esc_url($service_image); ?>" alt="<?php echo esc_attr($service[2]); ?>" loading="lazy" decoding="async">
                        <span class="ya-service-showcase-overlay"></span>
                        <span class="ya-service-showcase-number"><?php echo esc_html(str_pad($i + 1, 2, '0', STR_PAD_LEFT)); ?></span>
                        <span class="ya-service-showcase-icon"><i class="fa-solid fa-<?php echo esc_attr($service[1]); ?>"></i></span>
                    </a>

                    <div class="ya-service-showcase-content">
                        <span class="ya-mini-label">SERVICE IT</span>
                        <h3><a href="<?php echo esc_url($service_url); ?>"><?php echo esc_html($service[2]); ?></a></h3>
                        <p><?php echo esc_html($service[3]); ?></p>
                        <ul>
                            <?php foreach ($service[4] as $item) : ?>
                                <li><i class="fa-solid fa-circle-check"></i><?php echo esc_html($item); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <a class="ya-service-showcase-link" href="<?php echo esc_url($service_url); ?>">
                            <?php echo esc_html($L['buttons']['read_article']); ?>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="ya-dark-feature ya-service-benefits">
    <div class="ya-shell">
        <div class="ya-section-head ya-section-head-light reveal">
            <span class="ya-kicker"><?php echo esc_html($L['service_benefits']['kicker']); ?></span>
            <h2><?php echo esc_html($L['service_benefits']['title']); ?></h2>
            <p><?php echo esc_html($L['service_benefits']['text']); ?></p>
        </div>
        <div class="ya-process-grid">
            <?php foreach ($L['service_benefits']['steps'] as $step) : ?>
                <article class="ya-process-card reveal">
                    <b><?php echo esc_html($step[0]); ?></b>
                    <h3><?php echo esc_html($step[1]); ?></h3>
                    <p><?php echo esc_html($step[2]); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="ya-section ya-service-contact-strip">
    <div class="ya-shell ya-service-contact-in reveal">
        <div>
            <span class="ya-kicker"><?php echo esc_html($L['service_cta'][0]); ?></span>
            <h2><?php echo esc_html($L['service_cta'][1]); ?></h2>
            <p><?php echo esc_html($L['service_cta'][2]); ?></p>
        </div>
        <div class="ya-actions">
            <a class="ya-btn" href="<?php echo esc_url(ya_page('demander-un-devis')); ?>">
                <?php echo esc_html($L['buttons']['quote']); ?>
                <i class="fa-solid fa-arrow-right"></i>
            </a>
            <a class="ya-btn ya-btn-outline ya-btn-dark-outline" href="<?php echo esc_url(ya_page('contact')); ?>">
                <?php echo esc_html($L['buttons']['contact']); ?>
            </a>
        </div>
    </div>
</section>

<?php elseif ($template_slug === 'solutions') : ?>

<section class="ya-section ya-solutions-page ya-solutions-premium">
    <div class="ya-shell">
        <div class="ya-section-head reveal">
            <span class="ya-kicker"><?php echo esc_html($L['solutions_intro'][0]); ?></span>
            <h2><?php echo esc_html($L['solutions_intro'][1]); ?></h2>
            <p><?php echo esc_html($L['solutions_intro'][2]); ?></p>
        </div>

        <div class="ya-solution-stack">
            <?php foreach ($L['solutions'] as $solution) : ?>
                <article class="ya-solution-row reveal">
                    <span class="ya-solution-index"><?php echo esc_html($solution[0]); ?></span>
                    <div class="ya-solution-icon"><i class="fa-solid <?php echo esc_attr($solution[3]); ?>"></i></div>
                    <div class="ya-solution-content">
                        <span class="ya-mini-label">SOLUTION</span>
                        <h2><?php echo esc_html($solution[1]); ?></h2>
                        <p><?php echo esc_html($solution[2]); ?></p>
                        <small><?php echo esc_html($solution[4]); ?></small>
                    </div>
                    <a href="<?php echo esc_url(ya_page('contact')); ?>" class="ya-circle-link" aria-label="<?php echo esc_attr($L['buttons']['contact']); ?>">
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="ya-section ya-solution-detail-section">
    <div class="ya-shell ya-solution-detail-grid">
        <div class="ya-solution-detail-copy reveal">
            <span class="ya-kicker"><?php echo esc_html($L['workplace']['kicker']); ?></span>
            <h2><?php echo esc_html($L['workplace']['title']); ?></h2>
            <p><?php echo esc_html($L['workplace']['text']); ?></p>
            <div class="ya-solution-feature-list">
                <?php foreach ($L['workplace']['features'] as $feature) : ?>
                    <span><i class="fa-solid fa-circle-check"></i><?php echo esc_html($feature); ?></span>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="ya-solution-detail-panel reveal">
            <div class="ya-solution-panel-icon"><i class="fa-brands fa-microsoft"></i></div>
            <h3>Microsoft 365</h3>
            <p><?php echo esc_html($L['workplace']['panel']); ?></p>
            <div class="ya-solution-tags">
                <span>Teams</span><span>OneDrive</span><span>Exchange</span><span>SharePoint</span><span>Intune</span><span>Entra ID</span>
            </div>
            <a class="ya-service-showcase-link" href="<?php echo esc_url(ya_page('contact')); ?>">
                <?php echo esc_html($L['workplace']['link']); ?>
                <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<section class="ya-dark-feature ya-solution-network-section">
    <div class="ya-shell ya-split">
        <div class="reveal">
            <span class="ya-kicker"><?php echo esc_html($L['network']['kicker']); ?></span>
            <h2><?php echo esc_html($L['network']['title']); ?></h2>
            <p><?php echo esc_html($L['network']['text']); ?></p>
            <div class="ya-about-skill-tags">
                <span>Wi-Fi</span><span>Switching</span><span>VLAN</span><span>DNS</span><span>VPN</span><span>Firewall</span><span>Ubiquiti</span><span>Cisco</span><span>Fortinet</span>
            </div>
        </div>
        <div class="ya-stat-grid">
            <?php foreach ($L['network']['stats'] as $stat) : ?>
                <div class="reveal"><strong><?php echo esc_html($stat[0]); ?></strong><span><?php echo esc_html($stat[1]); ?></span></div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="ya-section ya-solution-operations">
    <div class="ya-shell">
        <div class="ya-section-head reveal">
            <span class="ya-kicker"><?php echo esc_html($L['operations']['kicker']); ?></span>
            <h2><?php echo esc_html($L['operations']['title']); ?></h2>
            <p><?php echo esc_html($L['operations']['text']); ?></p>
        </div>
        <div class="ya-solution-capability-grid">
            <?php foreach ($L['operations']['items'] as $item) : ?>
                <article class="ya-value-card ya-solution-capability-card reveal">
                    <div class="ya-card-icon"><i class="fa-solid <?php echo esc_attr($item[0]); ?>"></i></div>
                    <h3><?php echo esc_html($item[1]); ?></h3>
                    <p><?php echo esc_html($item[2]); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="ya-section ya-solution-process-section">
    <div class="ya-shell">
        <div class="ya-section-head reveal">
            <span class="ya-kicker"><?php echo esc_html($L['solution_process']['kicker']); ?></span>
            <h2><?php echo esc_html($L['solution_process']['title']); ?></h2>
        </div>
        <div class="ya-process-grid">
            <?php foreach ($L['solution_process']['steps'] as $step) : ?>
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

<section class="ya-section ya-about-section ya-about-premium">
    <div class="ya-shell ya-about-grid">
        <div class="ya-about-copy reveal">
            <span class="ya-kicker"><?php echo esc_html($L['about']['kicker']); ?></span>
            <h2><?php echo esc_html($L['about']['title']); ?></h2>
            <p><?php echo esc_html($L['about']['p1']); ?></p>
            <p><?php echo esc_html($L['about']['p2']); ?></p>

            <div class="ya-about-points">
                <?php foreach ($L['about']['points'] as $point) : ?>
                    <span><i class="fa-solid fa-circle-check"></i><?php echo esc_html($point); ?></span>
                <?php endforeach; ?>
            </div>

            <div class="ya-actions">
                <a class="ya-btn" href="<?php echo esc_url(ya_page('contact')); ?>">
                    <?php echo esc_html($L['buttons']['contact_me']); ?>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
                <a class="ya-btn ya-btn-outline" href="<?php echo esc_url(ya_page('services')); ?>">
                    <?php echo esc_html($L['buttons']['view_services']); ?>
                </a>
            </div>
        </div>

        <div class="ya-about-profile reveal">
            <div class="ya-about-profile-visual">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('large', ['class'=>'ya-about-photo','alt'=>'Yama Ahmadi']); ?>
                <?php else : ?>
                    <div class="ya-about-photo-placeholder">
                        <i class="fa-solid fa-user-gear"></i>
                        <span>Yama Ahmadi</span>
                        <small><?php echo esc_html($L['badges'][0]); ?></small>
                    </div>
                <?php endif; ?>
                <span class="ya-about-status"><i class="fa-solid fa-circle"></i><?php echo esc_html($L['about']['status']); ?></span>
            </div>
            <div class="ya-about-profile-meta">
                <strong>Poitiers, France</strong>
                <span><?php echo esc_html($L['about']['meta']); ?></span>
            </div>
        </div>
    </div>
</section>

<section class="ya-section ya-about-values-section">
    <div class="ya-shell">
        <div class="ya-section-head reveal">
            <span class="ya-kicker"><?php echo esc_html($L['about']['values_intro'][0]); ?></span>
            <h2><?php echo esc_html($L['about']['values_intro'][1]); ?></h2>
            <p><?php echo esc_html($L['about']['values_intro'][2]); ?></p>
        </div>
        <div class="ya-value-grid">
            <?php foreach ($L['about']['values'] as $value) : ?>
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
            <span class="ya-kicker"><?php echo esc_html($L['about']['cap_kicker']); ?></span>
            <h2><?php echo esc_html($L['about']['cap_title']); ?></h2>
            <p><?php echo esc_html($L['about']['cap_text']); ?></p>
            <div class="ya-about-skill-tags">
                <span>Windows</span><span>Microsoft 365</span><span>Intune</span><span>Wi-Fi</span><span>Switching</span><span>VLAN</span><span>DNS</span><span>VPN</span><span>Cybersecurity</span><span>Remote Hands</span><span>Deployment</span><span>L1/L2</span>
            </div>
        </div>
        <div class="ya-stat-grid">
            <?php foreach ($L['about']['stats'] as $stat) : ?>
                <div class="reveal"><strong><?php echo esc_html($stat[0]); ?></strong><span><?php echo esc_html($stat[1]); ?></span></div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="ya-section ya-about-process">
    <div class="ya-shell">
        <div class="ya-section-head reveal">
            <span class="ya-kicker"><?php echo esc_html($L['about']['process_intro'][0]); ?></span>
            <h2><?php echo esc_html($L['about']['process_intro'][1]); ?></h2>
        </div>
        <div class="ya-process-grid">
            <?php foreach ($L['about']['process'] as $step) : ?>
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

<section class="ya-section ya-project-page">
    <div class="ya-shell">
        <div class="ya-section-head reveal">
            <span class="ya-kicker"><?php echo esc_html($L['projects_intro'][0]); ?></span>
            <h2><?php echo esc_html($L['projects_intro'][1]); ?></h2>
            <p><?php echo esc_html($L['projects_intro'][2]); ?></p>
        </div>

        <div class="ya-card-grid ya-project-grid">
            <?php foreach ($L['projects'] as $project) : ?>
                <article class="ya-project-card ya-home-project-card reveal">
                    <div class="ya-project-top">
                        <span class="ya-mini-label"><?php echo esc_html($project[3]); ?></span>
                        <span class="ya-project-arrow"><i class="fa-solid fa-arrow-up-right"></i></span>
                    </div>
                    <h3><?php echo esc_html($project[0]); ?></h3>
                    <small><?php echo esc_html($project[1]); ?></small>
                    <p><?php echo esc_html($project[2]); ?></p>
                </article>
            <?php endforeach; ?>
        </div>

        <p class="ya-disclaimer"><?php echo esc_html($L['projects_disclaimer']); ?></p>
    </div>
</section>

<?php elseif ($template_slug === 'contact' || $template_slug === 'demander-un-devis') : ?>

<section class="ya-section ya-contact-section">
    <div class="ya-shell ya-contact-layout">
        <aside class="ya-contact-panel reveal">
            <span class="ya-kicker"><?php echo esc_html($L['contact']['direct']); ?></span>
            <h2><?php echo esc_html($template_slug === 'demander-un-devis' ? $L['contact']['quote_title'] : $L['contact']['contact_title']); ?></h2>
            <p><?php echo esc_html($L['contact']['intro']); ?></p>

            <div class="ya-contact-lines">
                <a href="tel:<?php echo esc_attr(preg_replace('/\s+/', '', $phone)); ?>">
                    <i class="fa-solid fa-phone"></i>
                    <span><small><?php echo esc_html($L['contact']['phone']); ?></small><?php echo esc_html($phone); ?></span>
                </a>

                <a href="mailto:<?php echo esc_attr($email); ?>">
                    <i class="fa-regular fa-envelope"></i>
                    <span><small><?php echo esc_html($L['contact']['email']); ?></small><?php echo esc_html($email); ?></span>
                </a>

                <div>
                    <i class="fa-solid fa-location-dot"></i>
                    <span><small><?php echo esc_html($L['contact']['area']); ?></small><?php echo esc_html($area); ?></span>
                </div>

                <div>
                    <i class="fa-regular fa-clock"></i>
                    <span><small><?php echo esc_html($L['contact']['availability']); ?></small><?php echo esc_html($hours); ?></span>
                </div>
            </div>

            <div class="ya-contact-note">
                <i class="fa-solid fa-shield-halved"></i>
                <span><?php echo esc_html($L['contact']['privacy']); ?></span>
            </div>
        </aside>

        <div class="ya-form-card reveal">
            <span class="ya-kicker"><?php echo esc_html($template_slug === 'demander-un-devis' ? $L['contact']['quote'] : $L['contact']['message']); ?></span>
            <h2><?php echo esc_html($template_slug === 'demander-un-devis' ? $L['contact']['describe'] : $L['contact']['send']); ?></h2>

            <?php
            $raw_content = get_the_content();
            $form_shortcode = '';

            if (preg_match('/\[fluentform[^\]]*id=["\']?(\d+)["\']?[^\]]*\]/i', $raw_content, $match)) {
                $form_shortcode = '[fluentform id="' . intval($match[1]) . '"]';
            }

            if (!$form_shortcode) {
                $form_shortcode = '[fluentform id="1"]';
            }
            ?>

            <div class="ya-existing-form"><?php echo do_shortcode($form_shortcode); ?></div>
        </div>
    </div>
</section>

<?php endif; ?>

<?php if (!in_array($template_slug, ['contact', 'demander-un-devis'], true)) : ?>
<section class="ya-cta ya-inner-final-cta">
    <div class="ya-shell ya-cta-in reveal">
        <div>
            <span class="ya-kicker"><?php echo esc_html($L['common_cta'][0]); ?></span>
            <h2><?php echo esc_html($L['common_cta'][1]); ?></h2>
            <p><?php echo esc_html($L['common_cta'][2]); ?></p>
        </div>
        <a class="ya-btn" href="<?php echo esc_url(ya_page('demander-un-devis')); ?>">
            <?php echo esc_html($L['buttons']['quote']); ?>
            <i class="fa-solid fa-arrow-right"></i>
        </a>
    </div>
</section>
<?php endif; ?>

<?php else : ?>

<section class="ya-inner-hero ya-inner-hero-compact">
    <div class="ya-inner-grid"></div>
    <div class="ya-shell">
        <span class="ya-kicker"><?php echo esc_html($L['standard_kicker']); ?></span>
        <h1><?php echo esc_html($title); ?></h1>
    </div>
</section>

<section class="ya-page">
    <div class="ya-shell ya-prose"><?php the_content(); ?></div>
</section>

<?php endif; ?>

<?php
endwhile;

get_footer();
