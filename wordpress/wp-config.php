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
define( 'DB_NAME', 'wordpress_db' );

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
define( 'AUTH_KEY',         '9yUu)*X4!}7.2BK GHKqbX9?)z@&8cl7}-_Q-l!:^[sjHJ+Kii,.Fwd4aC6vK$>@' );
define( 'SECURE_AUTH_KEY',  '~o)oF(e~^lLj`b5r.6z;u>ry?CS%.$G/YG<5HZ;s/8.R-Y^MS(KDn`-(dBz$6Y6S' );
define( 'LOGGED_IN_KEY',    '1#sc>CV~9l^ ~jx0u]iSF@m.`H_mS=nXj{WeqUM`8,[M<_b#t[?R:DGb]pH)h%ph' );
define( 'NONCE_KEY',        't,^6NV8R,<nEiwOX&]6Y+z^_%tFOC^[O|L2f%B5Zl,_pi1Ph|{S([j4N1W*#mbt+' );
define( 'AUTH_SALT',        'Fu6mg6S}%8#FI=mh.{tCkZ`A)35.#0iu5z1zTkSC:~5RW>=vr~c;q256adb,e9ik' );
define( 'SECURE_AUTH_SALT', ' Rr366A;{sDo/z{HQN6>21cGm0s_de!a+-*14w}JqK1dP9)v>3A2h$cYJd3B5ivR' );
define( 'LOGGED_IN_SALT',   ']JW}Q3H/c!Qv3#{8{(Ad{#H`>-b7Ot|YHWsKF`ES:p`[DN2k(lggudMi:.L)7C&&' );
define( 'NONCE_SALT',       'DN*Weny}i;?}M)tSA:nSsP>qyd9e$1$&xJgi0VnR-v[oC4SG0`@qDh_k<yRv7hNM' );

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
