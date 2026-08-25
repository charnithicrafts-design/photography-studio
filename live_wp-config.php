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
define( 'DB_NAME', 'charnith_chit' );

/** Database username */
define( 'DB_USER', 'chitramaya' );

/** Database password */
define( 'DB_PASSWORD', 'FCPwahueg7cw*42~' );

/** Database hostname */
define( 'DB_HOST', 'localhost:3306' );

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
define( 'AUTH_KEY',          'LoFx.sD4i?W!+V~lvBl7eJ&jX<GAPkLGn%d#VfcJ!|cudbIFLj%k)2GDLr{v=)))' );
define( 'SECURE_AUTH_KEY',   '4_Wrn7Br{~MBD+o0!M~/qN<>.++Srp^7N=LZEuo__={|tU}dSaG)b{aF_$`BBX+i' );
define( 'LOGGED_IN_KEY',     'WfVqT!zi;58mUXPCmF`g`IvyDWjek%OE(P-p4=4,1|$7UL3|v2n<{)Aq4r* VQ5 ' );
define( 'NONCE_KEY',         'tD=c2nX@e@94odt`psp=hQXS<uPY0s=Vz&<n:+W2O6ytR@*v41Mgz{&McuzgCy[6' );
define( 'AUTH_SALT',         '$3&bL/%8{5-d~oLb93[~T`<N,*fogiTg62[pu!VUk.y@]r64(qD0nB:MOt_Ci7q3' );
define( 'SECURE_AUTH_SALT',  'xc3R<Fgt7@_xDx$F^[zd[/7(oLJE5J6)#`FuI_(Vm;v.6V >H/TE$Snj4wVkI|{u' );
define( 'LOGGED_IN_SALT',    'MbiR[D564xf/M$]YI/6.dKD(?/f !7Z,_Nblr#Wh5xLA,}IyVe|#=!{$X~6Nt/m4' );
define( 'NONCE_SALT',        'Pr{o!ufJ^7eP* Y~w(=x(RrpvD3Yxwmdc-|&!E-|=Ny7e1.37pQXBE)P/JOPG.BZ' );
define( 'WP_CACHE_KEY_SALT', 'btF.:OQ7w&R*{P(+Xs#a/z4LCVsx1[pe2PDdXSRV>rAwcQuaz9!Pj{V6:_U-d6N;' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'oKnmwUj_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
