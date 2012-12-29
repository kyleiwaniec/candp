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
define('DB_NAME', 'kylehami_wp624');

/** MySQL database username */
define('DB_USER', 'kylehami_wp624');

/** MySQL database password */
define('DB_PASSWORD', 'cP18Sksuj9');

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
define('AUTH_KEY',         'gabl9cgthv2rfhxfbhtvwuz0kmyppjut33ylwd4fbkzvyafnimwulispklhhi5q3');
define('SECURE_AUTH_KEY',  '6lkkrwlxqrn242clghuy5zx7fowkeih5dtezlfe6yq8yl5dsiqp4os0xxkrnfe9a');
define('LOGGED_IN_KEY',    '3apakvknsovrtheophlupucindirnerv4jg5edzvl4fwm0q8t1mnmvdstfu2rokm');
define('NONCE_KEY',        'sc4ck7uhwixcewkch0cgaorjyublysphf3x7adi8hwslkwr4llmztjw2muufcmu7');
define('AUTH_SALT',        'bot8fzd7eokcwnvsrxmvhyb4jw3zxwpjfnwqr8ngdz8xioijiodyxywwn3xdywok');
define('SECURE_AUTH_SALT', '2j05wns16nffmvyjxl0obwdpf92tj47pm7xdcwe53iguyt4oal2rzwbdg7wfnoiz');
define('LOGGED_IN_SALT',   'dz3otdg2oexnm756scd1drvrgqbuauiiooya7ywyxyaxiqoc4ikahx1izii5n7dp');
define('NONCE_SALT',       '6prisqifjesdz87mqxpiy5eztn3e9hdhypskghnetebuoei89oxvqvqd8rga9g6c');

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
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define ('WPLANG', '');

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
