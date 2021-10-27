<?php

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

define('FS_METHOD', 'direct');


// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wp_db');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'mD+/oh!a5&7THsgPc8uX|,|/MlX -E25jAaM~06feX[VlCbav/h,.+vV`c.`,^N[');
define('SECURE_AUTH_KEY',  'MsqayBdCulv*PQ0EhP#fQZXI)<:bLLYV]WP_82JZYzVSxJ/:L$60h#rP]]nC4X}4');
define('LOGGED_IN_KEY',    's_}!MvMosf/NEeH9MmpBmJ%{5 9d:uC+9#;k>PVbONU(/qs?V0>U#:Ty$~B54IhL');
define('NONCE_KEY',        'd/_,0Vjzl#8O5VH0o8I^]/_+p/gAdD$MXA8Qm|oTEoW=:{O/aywtP}BTm#nuh1,s');
define('AUTH_SALT',        '7GA05+n>*4F;hAJe29RbxU)G_<I92FnOmc@Q4,BJK<g2soqMY>gss %&83pb6iyj');
define('SECURE_AUTH_SALT', '^Y9[1mo<o]_)noHLW3G5&FbSme4af!q?)%~9zmluS$mN<s@^4Hzmqf>EMD&i ((6');
define('LOGGED_IN_SALT',   '~t#D?n0=L|.` 4Iemtz&hV<6Z$A@WsRA7mTPbsS<SXvZh}Xt%zP3#Ga=X>E.1l1z');
define('NONCE_SALT',       'vpSwSf*(+!jw~%qX|ND2X9UACGAjnpssEGC*G:LUdH&|tH:ki]I^9e3on&;uj3Ma');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', false);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
