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
define('DB_NAME', 'wordpress');

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
define('AUTH_KEY',         'M5k;RtCQMk=F~FTWfLZBrWG]L^Kni4ar,R#~%,x<~Yz-bTS6Zgz(9t?cozg#t|8^');
define('SECURE_AUTH_KEY',  '8c?+X,d&i:(>91>o$<w,I PVmO&5A&yg#n`v (p.So;.)]u$DY<GOD8@7+sfRXly');
define('LOGGED_IN_KEY',    'zn<.w,gx B>|q6ox/v0F,[<mGILauADk=[T$G^C8jL][yG9ZX_7>ugJg18r(1YwK');
define('NONCE_KEY',        'kw7uTDX.Wx+-[+czOi?4%e76cb.8)q+|a]Skw!GvQ)L!Z|$}s0r|6a.AlhNeO-Ka');
define('AUTH_SALT',        '16/6Yv1l@< g!lE@j3~)[TleOgy7#k~H}<m1$W@)XgMdUw,IA>Wq)l+wZ).=1k}<');
define('SECURE_AUTH_SALT', ',0?(}cCd0Mn 5qyi-&2:cQXTHt+N7*M{}Pjf!XBU=c$e/^y-SnU.I!T4n$JwM]UN');
define('LOGGED_IN_SALT',   'EzwL!::]JZ{JkZ_nT6r;b4!pCEjI0R}RhFVo]X9J.Wrn0*e@u1k>nS%9R|z5Zw+-');
define('NONCE_SALT',       'smAB+QQ>^d.40A4nb$Pr]X-at1v[Nu.ST8.&$N=V^%=!a;a;vFuhRt-X`Aas^yQz');

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

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
