<?php


// ** MySQL settings ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'wpuser');

/** MySQL database password */
define('DB_PASSWORD', 'wpuser');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('AUTH_KEY',         '6bZF6ctjSQ#AO2eF2{?B%Ek^v }<|31fE%&>9;;9&nC3^l:yi}GC#YdYnzFB{z8:');
define('SECURE_AUTH_KEY',  '-3u;rvY/5$/&*{2E^Lu*+~#E2TKS@M@-j{jq6o_/Pqm2-RZo+/gtV*R>d?1z_8ND');
define('LOGGED_IN_KEY',    '2Vr ]#MqeEt>x,nf`G~5d449`6$+{syU![_}wkqQNNO%J>I/Z=2Q^b14-{6#vr(W');
define('NONCE_KEY',        '-aEK-@4qVruE{mH--R-Eo<x0v;s7s9h0eP:alhy6f|q*s<&x(s{aJo!y4<5m#r=H');
define('AUTH_SALT',        '#Q[SqB)&PU{_|K%]Vqz]fd@A-cvfkGR3cPj]?(?#Rs9Y(3XFL<}EZGg$5=vcb_w[');
define('SECURE_AUTH_SALT', 'p^5FWF`.e84%|2L:NTcp.xOi#:G#O8ch2I-?4 wx:}N[gI] 3r7M<4M-fk`Ui[P9');
define('LOGGED_IN_SALT',   'fS*tx_:Fo)ebAb~??<hN!D>OQuD+!$@bS=%;2!<*TD!7,w&j}E&@m2-<BmRJYapk');
define('NONCE_SALT',       'e:$BFEQ-Aa W;-~+pA6&X-)u,OZU/>NM*/zgInrYS|-Djjok+z3]Q`#rB`<5o^Nh');


$table_prefix = 'wp_';


define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );



/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
