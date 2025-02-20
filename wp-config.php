<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'bdgoikan' );

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
define( 'AUTH_KEY',         'tbRA;or0hBbdUm;[?hW>[MIA}qvSTTk4 Ot=TmwJtC`;D0h++]2xRL_!X_7Op!8Z' );
define( 'SECURE_AUTH_KEY',  '6{3eOG+s+$$i4x2chV30g>%hf!Ul$RMXzL-,>NT9)a-DpWE,`BwA_}P(X{f|vH(-' );
define( 'LOGGED_IN_KEY',    'Tl Zo$*L~+.K9?R]VsGdTEZE1wqL?Yc.(P&SSz989OHq91/*j?]`eZ$Fz:;fOtH(' );
define( 'NONCE_KEY',        '=oP*&FyC{p:&>d6a8P2k}<lE,3gXCv<A2$&<$6G#Z!2L:[`r,fNL~`|U.{6!d9}E' );
define( 'AUTH_SALT',        'f7>=E|:WT-)7+DOfq5oCb+ZDV9CYH8juu[0~QI!^:@*iv2|iYvsI$zFZ|u3*/nS.' );
define( 'SECURE_AUTH_SALT', ']U4>4T=D]<`|G<q8$``DEdg:VinmL`3e/<7P?ds{1lN>>t+MNGJ9BH8U5sg#|!@f' );
define( 'LOGGED_IN_SALT',   '10i^_S?.45L*ox{M8j$(^Z!az*4itwf_9`nc9-(aHr]UpHDJ~R5sD^r29<91EcOG' );
define( 'NONCE_SALT',       'Ul~v9hMd>aS`!vH+_^ev7z=)s]hQe?M<O&z={r8p2H>;M0P-d!Y[ilHJV8jlXo}F' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
