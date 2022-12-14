<?php
# Database Configuration
define( 'DB_NAME', 'wp_watercoolerusa' );
define( 'DB_USER', 'watercoolerusa' );
define( 'DB_PASSWORD', 'ScODdGMNWjofJbyJ451u' );
define( 'DB_HOST', '127.0.0.1:3306' );
define( 'DB_HOST_SLAVE', '127.0.0.1:3306' );
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
$table_prefix = 'wp_';

# Security Salts, Keys, Etc
define('AUTH_KEY',         '24EsENhR9j/>Z*ZZPI(6-|!5XyDZ3Bfq~vE!IU?q:x}#HhNbS6^|D5B2*4BDs&j;');
define('SECURE_AUTH_KEY',  ')T/6-m?;S+4[rv~4I-G%j.oWc4`QlnEP8F1F!5ry__Aa#q]+g{=T8mkufkfAv(/~');
define('LOGGED_IN_KEY',    '8&nF(/L%+-vf6[[p(EA!.@>dn!t_:dDRo`,rTdV|hmSq,ud+~~`lHCY>||yO|ls ');
define('NONCE_KEY',        '=Hj~Y<c$cx[$IFC7YyCsgO?}%]ALTig+Q_0zN]*1CCH=ww+Z)P-[,I#QCq-T+_^@');
define('AUTH_SALT',        'AN?PfoCEljXPSHS9.E+/*?W-[Wb+/7kZ>Kf[2{xe-r.i]QT2g|D<CEV_yRgO+v>+');
define('SECURE_AUTH_SALT', '!~fK,Tlfe=]K4 BhF6w7lM*x?Q6@Y6p6v7/:HT8~r+Da{0.jBXfDUT 5X47Nu7LC');
define('LOGGED_IN_SALT',   'p-9tNN{q!t[A96+qbSA=tvNxtR))P)rPn*S|iwF/c Z)Bgm[Y0[PE7>:G0is(H<W');
define('NONCE_SALT',       '3`*hzEo*aj*[i@m+wadxkG9E*YeVk;g}wk>-Jr7RrDD+ [=P>BPaO| 6.fq+V|qF');


# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'watercoolerusa' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

umask(0002);

define( 'WPE_APIKEY', 'd9d9fbc5812ae20440e68a97e16bcec76c41c161' );

define( 'WPE_CLUSTER_ID', '100033' );

define( 'WPE_CLUSTER_TYPE', 'pod' );

define( 'WPE_ISP', true );

define( 'WPE_BPOD', false );

define( 'WPE_RO_FILESYSTEM', false );

define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

define( 'WPE_SFTP_PORT', 2222 );

define( 'WPE_LBMASTER_IP', '' );

define( 'WPE_CDN_DISABLE_ALLOWED', true );

define( 'DISALLOW_FILE_MODS', FALSE );

define( 'DISALLOW_FILE_EDIT', FALSE );

define( 'DISABLE_WP_CRON', false );

define( 'WPE_FORCE_SSL_LOGIN', false );

define( 'FORCE_SSL_LOGIN', false );

/*SSLSTART*/ if ( isset($_SERVER['HTTP_X_WPE_SSL']) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on'; /*SSLEND*/

define( 'WPE_EXTERNAL_URL', false );

define( 'WP_POST_REVISIONS', FALSE );

define( 'WPE_WHITELABEL', 'wpengine' );

define( 'WP_TURN_OFF_ADMIN_BAR', false );

define( 'WPE_BETA_TESTER', false );

$wpe_cdn_uris=array ( );

$wpe_no_cdn_uris=array ( );

$wpe_content_regexs=array ( );

$wpe_all_domains=array ( 0 => 'watercoolerusa.wpengine.com', 1 => 'watercoolerusa.wpenginepowered.com', );

$wpe_varnish_servers=array ( 0 => 'pod-100033', );

$wpe_special_ips=array ( 0 => '104.155.151.202', );

$wpe_netdna_domains=array ( );

$wpe_netdna_domains_secure=array ( );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( );

define( 'WPE_SFTP_ENDPOINT', '' );
define('WPLANG','');

# WP Engine ID


# WP Engine Settings






define( 'MULTISITE', true );
define( 'SUBDOMAIN_INSTALL', true );
define( 'DOMAIN_CURRENT_SITE', 'watercoolerusa.wpengine.com' );
define( 'PATH_CURRENT_SITE', '/' );
define( 'SITE_ID_CURRENT_SITE', 1 );
define( 'BLOG_ID_CURRENT_SITE', 1 );

# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', __DIR__ . '/');
require_once(ABSPATH . 'wp-settings.php');
