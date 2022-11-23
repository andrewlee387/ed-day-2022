<?php
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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'eddaykudos' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'eiUpaJVtKZx1788J' );

/** Database hostname */
define( 'DB_HOST', 'devkinsta_db' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'm3AdC&E+VsSo?M48gj#uKTz~_&uu9P Ox$]iy=R_`jVeg[Vv%sH3bzsZfXW%z-67' );
define( 'SECURE_AUTH_KEY',   'htFv{D$*|grrp.cOMQVt /@iOUMFH(@t?<>6>vAlg*984ZA,I~L0Hrc8Z6ZJy!hL' );
define( 'LOGGED_IN_KEY',     '%1u&`>I}/F$nIB&/Y/5h,_yUnQ58wTO^z5[u^m/+|VU=Kn$Z0?iz<1G*B)ib31bL' );
define( 'NONCE_KEY',         'RThV6@u}vokWkzl?=jPNo+v+2j94]Ygsr$Wc:+meU2a`SN%!Gk$xs[p]=#p1PP)a' );
define( 'AUTH_SALT',         '@xp=87TtrbI$bG+YsGG-oE>HR,}+*%V7-:Bdx-Mf2r -dG vg *1DdI_igR|@eta' );
define( 'SECURE_AUTH_SALT',  '(3(}jaO$W|HA_OAo>z,b#EOADB1lD`;JVhJB*rO`!tteTY),`@k>T^&Zg(|-YZN%' );
define( 'LOGGED_IN_SALT',    'l)}<`2r! T;qf|#WmPwq4L?,)6*/1k99Ce>5V>`hE<>)5HO~(?>[G2+5#W^}qDu:' );
define( 'NONCE_SALT',        'JYqhFUKuWy]CApiBnZF{C)BOR-Wb9o^?Gy-h;fkw|~vr<^[~!X:6_;YSbdnNR(y*' );
define( 'WP_CACHE_KEY_SALT', ')#0[=a0#d(FA UZ{Gk?vR^a{k?X$t{gto.S~5fih-G= {h/|gNvQC/v0qs7E6P~A' );


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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
