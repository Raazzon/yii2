<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'n|(Q4-Qz1n4jX{Y3bR&O;/n0bc:|?b%2i6ZFO:bxEIb#(o7{G#uKf.Nxk}SnJt9}');
define('SECURE_AUTH_KEY',  'u,9=mkfv;A(qLH[{N)cX)uG)4s8x*?-gG+h $6i3oyA0,}t0^y_uk-q{2ONCz:N{');
define('LOGGED_IN_KEY',    '#v`{=l}pQ5J4m?Q qzguBw^=O-teIx;^n.!uqHR&_rCr?L~DXX4O*Yrj`En_B]xP');
define('NONCE_KEY',        'RD.Dq2VZv,I)+^tqGcX!OTVnVD>w)4NCHsrk!MqZ1M[$psTqKa~0&?ZhtW^Gqt%U');
define('AUTH_SALT',        'u[bjc&Qwww.H}enFRmI4uXQh2T#C?F>(t9AJnS<,uz^e,E4*g7x3c&2Ub1p#e(?v');
define('SECURE_AUTH_SALT', '5fnS_K{0=@lSXlt_j|a<psmq 7^ngwi`|!MzhszpvIK%9-c.|&oNOL4TNe^puL^L');
define('LOGGED_IN_SALT',   'IH[YY=;M1R(m$_+YoO68o<N(7U0F[}IH~JdS:1ti]]KjO%ZOGbrdc{]_*Z-VR6#y');
define('NONCE_SALT',       '|;aO{b8#JyirbIw@jIL[F*<@S^e6`|+rneAwJKE(Z`RfX[/J`.KY@^bn+@j0kX4&');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
