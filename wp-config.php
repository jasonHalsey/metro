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
define('DB_NAME', 'metro');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '8(9.38>:f|K!N+a|Hxk3%[RDc(}QQCT9G4YA%W)p*@=FGjTIK[Rkfy|&xE+:XpVd');
define('SECURE_AUTH_KEY',  'HodWk*q|Y3;^Ce:A#BDbB149lWH<@5s$lc|?|0n0 @0j&E?$=]:>>*:-pGgqlXV*');
define('LOGGED_IN_KEY',    'Nlb?qpD 3Yad,gL|wb;^xg;4oR(cCjoU-a!Zv!O+gG{YOYq1Hv-iyH{r^2ED|whl');
define('NONCE_KEY',        'g_|evDQwICBz7W{IA!iGyH+XKs#uIm+WIYROIU6N4&tl$NU)5c*o*W(,.&$x{Iw~');
define('AUTH_SALT',        '&wLMY!f,:NbUq772-jw8 7h-d=u?URBL7P-Thu@(UFtd<{((@)=7`1qI8Cv|p~#-');
define('SECURE_AUTH_SALT', 'p,76~CQDG;a,lE>-t*/o@Ny^dqM|m%[_@T GQ`Z4Tm-gV1=$/U8FZ{+^~<QS+o]@');
define('LOGGED_IN_SALT',   'dEM469h6pcw}J$3R4[eKL=%rxHGPJ4S5]W4wev=Q$9O$B8rWb,:6@m-L|it{:wK(');
define('NONCE_SALT',       'y0-U-N^0-?ss+5fUu^K[n)=RGLK JV|!#||B.*G+F)7_0Hx&(lm|w-01w?XQTRlf');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_metro_';

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
