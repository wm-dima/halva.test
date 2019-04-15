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
define('DB_NAME', 'halva_test');

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
define('AUTH_KEY',         '~_Pg/AAq10r5Te0 !A?1;i1J;`^vtG++>W:}l{@1pY*VQ9F{DnVZRTe;.z2?Sdyi');
define('SECURE_AUTH_KEY',  ':{b?_y]2GF:CYKTt?eK#z[(HicS2@T?zzR2.ACl@.]W&+6qj[g;33I+(0t$&mVvi');
define('LOGGED_IN_KEY',    '=^wY(3L<^0^MzqVO*[w0lvwiCm--EZ/8bXCG x#GMz2qqNVij 1M)D`t>%K~e:XQ');
define('NONCE_KEY',        'Oa0{Ng3-J+?N,*Bop`i(YGql#ocG_l2FfN=z3n)jNqEIqy9&|Wv9-bo})P#~IOaE');
define('AUTH_SALT',        'CpSU_6-6ZXSl-twx y3jDmlW^c3W-n)-uiil/j98yrEa@L%(GhU32-ktelAZFm_a');
define('SECURE_AUTH_SALT', 'Ry1g)!BU}EBn^`9GAc~C{DpxaoO<5yted6L>YZ(Q73q=igPAA>NE.gQ0i upxPr%');
define('LOGGED_IN_SALT',   '0gwXP%^b&JsG ZE%AwNQ{5}g00I^O-jb#?hj7]lVcWexMMgsojsZuiT7u]Mr0!V1');
define('NONCE_SALT',       '(Yz3N8~Q-QpL=}#F2a:{()8kgmb^<l6W89U$]vR1JY.8=z&RpiC 7VQYF->s}s{#');

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
define('WP_DEBUG', true);
define('WP_DEBUG_DISPLAY', true);