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
define('DB_NAME', 'playdiary');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '22367417');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('WP_CACHE', true); //Added by WP-Cache Manager
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'T`SUiJsnAN?rJy6gC))AHC7H#xH9t>9ul1~-/I]&`^Z#L+5HP:6.z-zhJiH9;baE');
define('SECURE_AUTH_KEY',  'L_ZMl #5go xA~Qy8|F^o2vaa5d|31$Ku2NU#Tu)s2nS2,x3{e`A1u,d+ddlAMhC');
define('LOGGED_IN_KEY',    '+n^ERW]>,LuJ%3P&ANhC1wDeM}m[~G|-Il7lA[T?hN#2zcv5.3YBggz&=MK#A$lN');
define('NONCE_KEY',        's~ZwMN{d3/<0vqU)-OJrYvvS6PZ}2X+9)et@yV[-Ry1^0<t0h|SS2ITU+Sk/`^-X');
define('AUTH_SALT',        'FFdGU+7obabCmg%+uczwXJHhBj4v)KeQAQ_s4CZ-+d9X.Y+Zh~Q}JJ|(W[q{Z~i-');
define('SECURE_AUTH_SALT', 'J-e#-{.98TI04*q{8%/7BOdjdz#qCX#p~;Vcr_)%9690E9)(0w!~-m]t.9rk6%}g');
define('LOGGED_IN_SALT',   'k1*5e9sY+2%*QD7X_9)s,c/yB!a{zVyvtz48w85p5*QO3< l|q5SbL-]=3Mw@K+a');
define('NONCE_SALT',       'NFE [sZb@(bH-+3k;p6i+1OE+x$4k&`A,V0w1e0wx|qfcZ|Vu=k^Y+E!zy>gu%HG');

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

if ( isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
  $ips = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
  $_SERVER['REMOTE_ADDR'] = $ips[0];
}

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
