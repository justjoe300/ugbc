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
define('DB_NAME', 'bitnami_ugbc');

/** MySQL database username */
define('DB_USER', 'bn_ugbc');

/** MySQL database password */
define('DB_PASSWORD', '6d5d04aa40');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1:3306');

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
define('AUTH_KEY',         'a0a75afac2e3f480365d447d8157408ab228e30ae38e00f2aac3a0d089d48ff4');
define('SECURE_AUTH_KEY',  '27d1a8ca0e2eb9b5d2614294f00fae7149575a3b6dd2b6b8cf250310b06e5d08');
define('LOGGED_IN_KEY',    '4464956aeba0dcbcf7b1af413b3b57d75f9889a7de498f58dd6b3e9b495b0094');
define('NONCE_KEY',        'c51aa5c22b7bc3e18bbcf078f06cbbef3cc746627915a4f0d89a8e2487f903fb');
define('AUTH_SALT',        '202e6d7f3d24c99e7ec3f83d5e3da11543756f4ee3f20491b4062d657b716806');
define('SECURE_AUTH_SALT', '52b6d6c29c8c8890a4d9b8f3ee2149d33bd6aad3d0ca4997ac7bd7764a9a5763');
define('LOGGED_IN_SALT',   '495785ce257e6d0addb5b02552e4e3d6e1ad7e12ad3fe48599bb91cb6eedaf30');
define('NONCE_SALT',       '38dfda5a6432dfd1a3348de4651e087a5522a5fd63f33fb2e79db90cfedbe2e5');

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
/**
 * The WP_SITEURL and WP_HOME options are configured to access from any hostname or IP address.
 * If you want to access only from an specific domain, you can modify them. For example:
 *  define('WP_HOME','http://example.com');
 *  define('WP_SITEURL','http://example.com');
 *
*/

define('WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] . '/ugbc');
define('WP_HOME', 'http://' . $_SERVER['HTTP_HOST'] . '/ugbc');


/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define('WP_TEMP_DIR', 'C:/Bitnami/wampstack-5.6.21-2/apps/ugbc/tmp');



//  Disable pingback.ping xmlrpc method to prevent Wordpress from participating in DDoS attacks
//  More info at: https://wiki.bitnami.com/Applications/Bitnami_Wordpress#XMLRPC_and_Pingback

// remove x-pingback HTTP header
add_filter('wp_headers', function($headers) {
    unset($headers['X-Pingback']);
    return $headers;
});
// disable pingbacks
add_filter( 'xmlrpc_methods', function( $methods ) {
        unset( $methods['pingback.ping'] );
        return $methods;
});
