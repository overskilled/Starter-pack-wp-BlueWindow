<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'Blue_window' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',         'tU~F[T2yc#%)^:Jvm27ghr1}LzPp]9cu+]Hw8/O$l e2T;!^Nt&`Fhse0T-oN 1a' );
define( 'SECURE_AUTH_KEY',  'z{BH0S1;AYtqLZC&|j(+0q5rY,q/xusB)aK23{Nks|.K[k_jbzliKU*M.;nLY~{P' );
define( 'LOGGED_IN_KEY',    'D=h8Jcc/tH;#Qn/.$_H>M~~p da&?}?JT0#g~$RamZR18HR+^^Q=e).].Sj9j:x&' );
define( 'NONCE_KEY',        'vvphuywq3/nkQHQ5AWud(b=c&chgjOYmZe0xR]?.Af{Gu=7&i[ lSR0.FyceO]Nx' );
define( 'AUTH_SALT',        'd>fEXNA#D]]N0fd=:U.di1o@8YPs4S=MTlMaT4)U7[*yiKkGZjQ 5Iun}`84GH~X' );
define( 'SECURE_AUTH_SALT', 'M6PJNJSX:W:m!h8$QxoO$QU|N9+~}v#y&LLFoN|z,Y%1Yx:A1~k(&eX}`e[?>8~f' );
define( 'LOGGED_IN_SALT',   'i5 umQk6:n|W:ty{-DFL-%|mcAk><s$!_#FtThIj~)D;{8zk1b@6O)@3; jD7)Dg' );
define( 'NONCE_SALT',       'r_K{,}Ap<>{#Mlu0]AeUb#|9`X5|F:m?}xe1Eh}+vZXZcZG3YNQ`KM`o,q!r<FzU' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
