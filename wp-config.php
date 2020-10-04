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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'mKJlUZm@)bz>cm8w2ao?.ptMl_x]mFKy,.#|Q6E%6sz[Z/?h-|.rS>ybW]xPSso#' );
define( 'SECURE_AUTH_KEY',  'L$AA1-{EwjO_i7+sM?A<~JA2dxK*<^R^*5?j(x^*=W(6.W+ uX^`82g[2bSHJ+Po' );
define( 'LOGGED_IN_KEY',    '%V4}=a>?b(xmk2XNTPj(a7cC0%;,nrl{++LrKaj#s?s-CWqGUVI2P#;tkAnRE(5.' );
define( 'NONCE_KEY',        '5* +m=9/}D|C-d|>eQGZU1p?7NQ|C[O,NzDkTc S>@>,>_%EWfF-@#)%,wO`WpFO' );
define( 'AUTH_SALT',        '~s6D=$bP2`h%y[u`h5<b%t;cTNkBU!wfcIriZd0UV>T#[dyKoO5[W_C?!7ZDpE%4' );
define( 'SECURE_AUTH_SALT', 'u<].hV>LxPW4j(c|_nvax4MFn*=^dzZUdi|DEj`sA@oJiAyjad8@vM/z9}tXaEvw' );
define( 'LOGGED_IN_SALT',   'THf^)8j+CJ9kn{%2Q% Eq]U|[W2vz;L(YV%eOSR[d[/s,Z.Ghmw=:Kdotu[r/#4I' );
define( 'NONCE_SALT',       '`8un|g oa@=@L.}JvC.yZGfB86}!v]DO/6Sh-G?7}IGT9do]ggrNylWxk$Zf^rdB' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
