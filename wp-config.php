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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'lush' );

/** MySQL database username */
define( 'DB_USER', 'lush' );

/** MySQL database password */
define( 'DB_PASSWORD', '123456' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'YC*UTl ,67!n9=X-4E^0Rmysb-a57saUU2}q/w,Zzw(_{|:gC.G%Z<Kwv}YVO7O2' );
define( 'SECURE_AUTH_KEY',  '_oGqRGlYM:9vD$~-b]FG0#Z|yT/B9!XL9fF (bV#|8(p2[=`*jO0@YJniLh4|@K>' );
define( 'LOGGED_IN_KEY',    '9qn!Rq09}K7+N<)Vs4QDPe=Q`?:Xk$rPM[30iZsm-6mb[1u#Uz;2Eb)4.FD?mO%E' );
define( 'NONCE_KEY',        'sv8y=*sq6pwC?OB3CY7j*z.Zm+QJoj<*ZKPw3?q)>anHn2qZ/z#QZHrok#=!@c:c' );
define( 'AUTH_SALT',        '?;)gNS%h4hA9U766BN;|k@diOM+P]d4=y%rDXpfoIA:wel4F>8(&xPnq[354.fM<' );
define( 'SECURE_AUTH_SALT', '^J&UJE>V,FN+!*tVJ*,yf=#J#_tn,&#9co>Aj1J0Jyd#@c(5^B[]<sQwj4tdw,>v' );
define( 'LOGGED_IN_SALT',   'J%P2Cn?w(MRe/hGM%jRfM8E}p``aK`Cr8fnPLzhB P-e4r`nQQ?qk%S^sJ2oar/~' );
define( 'NONCE_SALT',       '9D,&`#g0}&o%|To+jE_&Z+0A[uDXx#x,V?s<h(s)H(`M&:*N$p~XFp(7ogH9]WPm' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wsdgsgp_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

//  Fs method

 define( 'FS_METHOD', 'direct' );
