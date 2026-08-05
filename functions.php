<?php
defined('ABSPATH') || exit;

define('YA_VERSION','2.0.0');

function ya_setup(){
 add_theme_support('title-tag'); add_theme_support('post-thumbnails'); add_theme_support('custom-logo',['height'=>80,'width'=>320,'flex-height'=>true,'flex-width'=>true]);
 add_theme_support('html5',['search-form','gallery','caption','style','script']);
 add_theme_support('align-wide'); add_theme_support('responsive-embeds');
 register_nav_menus(['primary'=>__('Primary Menu','yama-ahmadi-pro'),'footer'=>__('Footer Menu','yama-ahmadi-pro')]);
}
add_action('after_setup_theme','ya_setup');

function ya_assets(){
 wp_enqueue_style('ya-fontawesome','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css',[],null);
 wp_enqueue_style('ya-main',get_template_directory_uri().'/assets/css/main.css',[],YA_VERSION);
 wp_enqueue_script('ya-main',get_template_directory_uri().'/assets/js/main.js',[],YA_VERSION,true);
 wp_localize_script('ya-main','YAMA_SITE',['home'=>home_url('/'),'ajax'=>admin_url('admin-ajax.php'),'nonce'=>wp_create_nonce('ya_nonce'),'lang'=>ya_lang(),'manifest'=>home_url('/manifest.webmanifest')]);
}
add_action('wp_enqueue_scripts','ya_assets');

function ya_languages(){return [
 'fr'=>['label'=>'Français','short'=>'FR','flag'=>'🇫🇷'],
 'en'=>['label'=>'English','short'=>'EN','flag'=>'🇬🇧'],
 'de'=>['label'=>'Deutsch','short'=>'DE','flag'=>'🇩🇪'],
];}
function ya_lang(){
 $langs=ya_languages();
 if(isset($_GET['lang']) && isset($langs[sanitize_key($_GET['lang'])])){ $l=sanitize_key($_GET['lang']); setcookie('ya_lang',$l,time()+31536000,COOKIEPATH?:'/'); return $l; }
 if(isset($_COOKIE['ya_lang']) && isset($langs[$_COOKIE['ya_lang']])) return sanitize_key($_COOKIE['ya_lang']);
 return 'fr';
}
function ya_url_lang($l){return add_query_arg('lang',$l,home_url(wp_parse_url($_SERVER['REQUEST_URI']??'/',PHP_URL_PATH)));}
function ya_t($key){
 $d=[
 'fr'=>[
  'home'=>'Accueil','about'=>'À propos','services'=>'Services','solutions'=>'Solutions','projects'=>'Projets','blog'=>'Blog','contact'=>'Contact','quote'=>'Demander un devis','location'=>'Zone d’intervention','france'=>'France','hero_kicker'=>'YAMA AHMADI • SERVICES INFORMATIQUES','hero_title'=>'Des solutions IT fiables pour votre entreprise.','hero_text'=>'Support informatique, réseaux, cybersécurité, Microsoft 365, cloud et assistance terrain pour les entreprises qui exigent fiabilité, sécurité et réactivité.','hero_cta'=>'Découvrir nos services','hero_quote'=>'Demander un devis','services_title'=>'Des services IT complets pour vos besoins','services_intro'=>'Des solutions professionnelles sur site et à distance pour maintenir, sécuriser et faire évoluer votre environnement informatique.','why'=>'Pourquoi choisir Yama Ahmadi','why_title'=>'Une assistance rapide, claire et professionnelle','coverage'=>'Interventions partout en France','certified'=>'Compétences & certifications IT','response'=>'Réponse rapide selon disponibilité','cta_title'=>'Besoin d’un expert IT ?','cta_text'=>'Expliquez votre besoin et recevez une réponse claire et professionnelle.','app'=>'Installer notre application','app_text'=>'Ajoutez Yama Ahmadi à votre écran d’accueil pour un accès rapide.','privacy'=>'Confidentialité','legal'=>'Mentions légales','cookies'=>'Cookies','terms'=>'Conditions d’utilisation','detect'=>'Détecter ma localisation','language'=>'Langue','close'=>'Fermer','readmore'=>'En savoir plus','latest'=>'Conseils & actualités IT','latest_intro'=>'Guides, sécurité, réseaux et bonnes pratiques pour votre entreprise.'
 ],
 'en'=>[
  'home'=>'Home','about'=>'About','services'=>'Services','solutions'=>'Solutions','projects'=>'Projects','blog'=>'Insights','contact'=>'Contact','quote'=>'Request a quote','location'=>'Service area','france'=>'France','hero_kicker'=>'YAMA AHMADI • IT SERVICES','hero_title'=>'Reliable IT solutions for your business.','hero_text'=>'IT support, networks, cybersecurity, Microsoft 365, cloud and field services for businesses that require reliability, security and responsiveness.','hero_cta'=>'Explore our services','hero_quote'=>'Request a quote','services_title'=>'Complete IT services for your needs','services_intro'=>'Professional on-site and remote solutions to maintain, secure and improve your IT environment.','why'=>'Why choose Yama Ahmadi','why_title'=>'Fast, clear and professional IT support','coverage'=>'Coverage across France','certified'=>'IT skills & certifications','response'=>'Fast response subject to availability','cta_title'=>'Need an IT expert?','cta_text'=>'Tell us what you need and receive a clear professional response.','app'=>'Install our app','app_text'=>'Add Yama Ahmadi to your home screen for faster access.','privacy'=>'Privacy','legal'=>'Legal notice','cookies'=>'Cookies','terms'=>'Terms of use','detect'=>'Detect my location','language'=>'Language','close'=>'Close','readmore'=>'Learn more','latest'=>'IT insights & updates','latest_intro'=>'Practical guidance on security, networking and business IT.'
 ],
 'de'=>[
  'home'=>'Startseite','about'=>'Über uns','services'=>'Services','solutions'=>'Lösungen','projects'=>'Projekte','blog'=>'Blog','contact'=>'Kontakt','quote'=>'Angebot anfordern','location'=>'Einsatzgebiet','france'=>'Frankreich','hero_kicker'=>'YAMA AHMADI • IT-SERVICES','hero_title'=>'Zuverlässige IT-Lösungen für Ihr Unternehmen.','hero_text'=>'IT-Support, Netzwerke, Cybersicherheit, Microsoft 365, Cloud und Vor-Ort-Service für Unternehmen mit hohen Ansprüchen an Sicherheit und Zuverlässigkeit.','hero_cta'=>'Services entdecken','hero_quote'=>'Angebot anfordern','services_title'=>'Komplette IT-Services für Ihren Bedarf','services_intro'=>'Professionelle Vor-Ort- und Remote-Lösungen für Wartung, Sicherheit und Weiterentwicklung Ihrer IT.','why'=>'Warum Yama Ahmadi','why_title'=>'Schneller, klarer und professioneller IT-Support','coverage'=>'Einsätze in ganz Frankreich','certified'=>'IT-Kompetenzen & Zertifizierungen','response'=>'Schnelle Reaktion nach Verfügbarkeit','cta_title'=>'Benötigen Sie einen IT-Experten?','cta_text'=>'Beschreiben Sie Ihren Bedarf und erhalten Sie eine klare professionelle Antwort.','app'=>'App installieren','app_text'=>'Fügen Sie Yama Ahmadi für schnellen Zugriff zum Startbildschirm hinzu.','privacy'=>'Datenschutz','legal'=>'Impressum','cookies'=>'Cookies','terms'=>'Nutzungsbedingungen','detect'=>'Standort erkennen','language'=>'Sprache','close'=>'Schließen','readmore'=>'Mehr erfahren','latest'=>'IT-Tipps & Neuigkeiten','latest_intro'=>'Praxisnahe Hinweise zu Sicherheit, Netzwerken und Business-IT.'
 ]];
 $l=ya_lang(); return $d[$l][$key]??$d['fr'][$key]??$key;
}
function ya_page($slug){$p=get_page_by_path($slug);return $p?get_permalink($p):home_url('/'.$slug.'/');}

function ya_contact_info_customize($wp){
 $wp->add_section('ya_company',['title'=>'Yama Ahmadi — Company','priority'=>30]);
 foreach([
  'ya_phone'=>['Phone','+33 7 84 20 31 50'],
  'ya_email'=>['Email','support@yamaahmadi.fr'],
  'ya_location'=>['Service area','France'],
  'ya_hours'=>['Hours','Lun – Ven : 08:00 – 18:00'],
  'ya_linkedin'=>['LinkedIn URL',''],
  'ya_facebook'=>['Facebook URL',''],
 ] as $id=>$cfg){$wp->add_setting($id,['default'=>$cfg[1],'sanitize_callback'=>'sanitize_text_field']);$wp->add_control($id,['section'=>'ya_company','label'=>$cfg[0],'type'=>'text']);}
}
add_action('customize_register','ya_contact_info_customize');

function ya_create_pages(){
 $pages=['a-propos'=>'À propos','services'=>'Services','solutions'=>'Solutions','projets'=>'Projets','contact'=>'Contact','demander-un-devis'=>'Demander un devis','mentions-legales'=>'Mentions légales','politique-de-confidentialite'=>'Politique de confidentialité','politique-de-cookies'=>'Politique de cookies','conditions-utilisation'=>'Conditions d’utilisation'];
 foreach($pages as $slug=>$title){ if(!get_page_by_path($slug)) wp_insert_post(['post_type'=>'page','post_status'=>'publish','post_title'=>$title,'post_name'=>$slug,'post_content'=>'']); }
}
add_action('after_switch_theme','ya_create_pages');

// PWA manifest + service worker at root.
function ya_rewrites(){add_rewrite_rule('^manifest\.webmanifest$','index.php?ya_manifest=1','top');add_rewrite_rule('^service-worker\.js$','index.php?ya_sw=1','top');}
add_action('init','ya_rewrites');
add_filter('query_vars',function($v){$v[]='ya_manifest';$v[]='ya_sw';return $v;});
add_action('template_redirect',function(){
 if(get_query_var('ya_manifest')){header('Content-Type: application/manifest+json; charset=utf-8');echo wp_json_encode(['name'=>'Yama Ahmadi IT Support & Services','short_name'=>'Yama Ahmadi','start_url'=>home_url('/'),'display'=>'standalone','background_color'=>'#061317','theme_color'=>'#0b6f63','icons'=>[['src'=>get_template_directory_uri().'/assets/img/app-icon-192.png','sizes'=>'192x192','type'=>'image/png'],['src'=>get_template_directory_uri().'/assets/img/app-icon-512.png','sizes'=>'512x512','type'=>'image/png']]]);exit;}
 if(get_query_var('ya_sw')){header('Content-Type: application/javascript; charset=utf-8');header('Service-Worker-Allowed: /');?>const CACHE='yama-pro-v2';const CORE=[<?php echo wp_json_encode(home_url('/')); ?>];self.addEventListener('install',e=>e.waitUntil(caches.open(CACHE).then(c=>c.addAll(CORE))));self.addEventListener('activate',e=>e.waitUntil(caches.keys().then(k=>Promise.all(k.filter(x=>x!==CACHE).map(x=>caches.delete(x))))));self.addEventListener('fetch',e=>{const u=new URL(e.request.url);if(e.request.method!=='GET'||u.pathname.includes('/wp-admin')||u.pathname.includes('/wp-login'))return;e.respondWith(fetch(e.request).then(r=>{const x=r.clone();caches.open(CACHE).then(c=>c.put(e.request,x));return r}).catch(()=>caches.match(e.request).then(r=>r||caches.match(<?php echo wp_json_encode(home_url('/')); ?>))))});<?php exit;}
});
add_action('wp_head',function(){echo '<link rel="manifest" href="'.esc_url(home_url('/manifest.webmanifest')).'"><meta name="theme-color" content="#061317"><meta name="apple-mobile-web-app-capable" content="yes"><link rel="apple-touch-icon" href="'.esc_url(get_template_directory_uri().'/assets/img/app-icon-192.png').'">';});
add_action('after_switch_theme',function(){ya_rewrites();flush_rewrite_rules();});

function ya_body_classes($c){$c[]='ya-lang-'.ya_lang();return $c;} add_filter('body_class','ya_body_classes');

function ya_fallback_page($slug){ob_start();
 if($slug==='services'){?><div class="ya-section-head"><h2><?php echo ya_t('services_title');?></h2><p><?php echo ya_t('services_intro');?></p></div><div class="ya-services"><?php foreach([['support','Support informatique','Assistance sur site et à distance pour postes, logiciels, imprimantes et incidents.'],['network','Réseaux & Wi‑Fi','Wi‑Fi, switches, routeurs, VLAN, pare-feu et connectivité sécurisée.'],['security','Cybersécurité','Protection des postes, comptes, accès, sauvegardes et réseaux.'],['cloud','Microsoft 365 & Cloud','Exchange, Teams, OneDrive, SharePoint, migrations et gestion des comptes.'],['infra','Infrastructure IT','Déploiement, maintenance, postes, serveurs, inventaire et périphériques.'],['consult','Conseil IT','Audit, recommandations, optimisation et accompagnement technique.']] as $s):?><article id="<?php echo $s[0];?>" class="ya-service"><h3><?php echo $s[1];?></h3><p><?php echo $s[2];?></p></article><?php endforeach;?></div><?php }
 elseif($slug==='a-propos'){?><h2>Yama Ahmadi Services Informatiques</h2><p>Nous accompagnons les entreprises et professionnels avec des services de support informatique, réseau, cybersécurité, Microsoft 365, cloud, maintenance et assistance terrain.</p><h3>Une approche orientée résultat</h3><p>Chaque mission commence par l’analyse du besoin, suivie d’une proposition claire, d’une intervention structurée et d’une validation technique.</p><?php }
 elseif($slug==='solutions'){?><h2>Solutions professionnelles</h2><div class="ya-services"><article class="ya-service"><h3>Modern Workplace</h3><p>Microsoft 365, Teams, OneDrive, identité, sécurité et mobilité.</p></article><article class="ya-service"><h3>Secure Network</h3><p>Wi‑Fi professionnel, segmentation, firewall, VPN et optimisation réseau.</p></article><article class="ya-service"><h3>IT Operations</h3><p>Support utilisateurs, postes, déploiements, maintenance et documentation.</p></article></div><?php }
 elseif($slug==='projets'){?><h2>Expériences & interventions</h2><p>Interventions de support, déploiement, réseau et infrastructure réalisées dans différents environnements professionnels et industriels en France.</p><?php }
 elseif($slug==='contact' || $slug==='demander-un-devis'){?><div class="ya-contact-grid"><div><h2><?php echo ya_t('contact');?></h2><p><strong>Téléphone</strong><br><?php echo esc_html(get_theme_mod('ya_phone','+33 7 84 20 31 50'));?></p><p><strong>E-mail</strong><br><?php echo esc_html(get_theme_mod('ya_email','support@yamaahmadi.fr'));?></p><p><strong><?php echo ya_t('location');?></strong><br><?php echo esc_html(get_theme_mod('ya_location','France'));?></p></div><div class="ya-form-placeholder"><h3><?php echo ya_t('quote');?></h3><p>Ajoutez ici votre formulaire WordPress préféré (Fluent Forms, WPForms, Contact Form 7 ou formulaire existant). Le thème stylise automatiquement les champs.</p><?php echo do_shortcode('[fluentform id="1"]');?></div></div><?php }
 elseif(strpos($slug,'confidentialite')!==false){?><h2>Politique de confidentialité</h2><p>Les données transmises via les formulaires sont utilisées uniquement pour répondre aux demandes et fournir les services sollicités. Complétez cette page selon vos traitements réels et vos obligations RGPD.</p><?php }
 elseif(strpos($slug,'cookies')!==false){?><h2>Politique de cookies</h2><p>Le site peut utiliser des cookies nécessaires au fonctionnement ainsi que, selon votre configuration, des outils de mesure d’audience ou services tiers. Configurez votre gestionnaire de consentement selon les outils effectivement utilisés.</p><?php }
 elseif($slug==='mentions-legales'){?><h2>Mentions légales</h2><p>Éditeur : Yama Ahmadi Services Informatiques<br>Site : yamaahmadi.fr<br>E-mail : <?php echo esc_html(get_theme_mod('ya_email','support@yamaahmadi.fr'));?><br>Téléphone : <?php echo esc_html(get_theme_mod('ya_phone','+33 7 84 20 31 50'));?></p><p>Complétez cette page avec votre SIREN/SIRET, adresse professionnelle et informations d’hébergement réelles.</p><?php }
 else{?><p>Contenu à compléter depuis l’éditeur WordPress.</p><?php }
 return ob_get_clean();}
