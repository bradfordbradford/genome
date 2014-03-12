<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'jjjohn_genome');

/** MySQL database username */
define('DB_USER', 'jjjohn_admin');

/** MySQL database password */
define('DB_PASSWORD', 'w3dd1ng!');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'cIxZV+khEN8R^+BN)pJhu4!.2n2:L0[?,{oKh5^!z]ro_/(n*>X1734lj>:uI9e0');
define('SECURE_AUTH_KEY',  '7=Q.[0a.CffK&H+Q-};#0GgEDCI q~h,h.L+vgm@|?--GY~yrI(NbFm4>V%O!9?y');
define('LOGGED_IN_KEY',    '&O?|k*b3[?c&Oa([G8IY;{N-xpRU!+4>W6}u0)3Zt1%.=t4cZNhK`h~7G|}$IuC7');
define('NONCE_KEY',        '!8YbdQc(AKF A!j76<5+3|MsX-g$wBVI--b`~.xJ--fj]J,{Snk#v{-<h|q48[/9');
define('AUTH_SALT',        '#}>:5c?L^`:G{f4:0-V? (g6_NZyq=IrL.B|uK &1(5Yh<^eq=RE}sxv{b043O<8');
define('SECURE_AUTH_SALT', '@=:QCY*8]<NU/ABcJln+l^Cf+r:O@$Xp$Zg++1@5D=SGZr8D^Fq{0oJc-CR3E9&N');
define('LOGGED_IN_SALT',   't$5b=/0b>w-v.OAkRJ5ph!&%=N}yR6C0]3oBuLkJ|?a &E62jZOt+?>P8JfC}rDm');
define('NONCE_SALT',       'aY:&AD>O4@upDL8z._Y5Z<:2OoLLQ@6</|eD9gs-4+{-LTW~dRu4rO]+~6-uk}`s');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
