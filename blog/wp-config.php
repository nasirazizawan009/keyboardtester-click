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
define( 'DB_NAME', 'keyboar1_wp505' );

/** Database username */
define( 'DB_USER', 'keyboar1_wp505' );

/** Database password */
define( 'DB_PASSWORD', 'gr41S(!92p' );

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
define( 'AUTH_KEY',         'nmbktsturoin1hmmz6nmfpf8h578pvvpungm9rb2ubjg1hjlf9kmxivubw3aur1n' );
define( 'SECURE_AUTH_KEY',  'eagu3eimfgar8kidzyy9buw2bgzfygy1jz29f56d1xknr1rw1auu0kvimqymsej4' );
define( 'LOGGED_IN_KEY',    'rvhzzxnqqcy8tb0r7eg0v8d3dikyq2kfceo2lvtcmhc41tmxkcjgkjlguyu0lvcp' );
define( 'NONCE_KEY',        'ehzpeuamruuxgzg339hkjdpypnlzdtiwgx9tofycs8zeiaha82xcexj5zm4isclw' );
define( 'AUTH_SALT',        'japxvzrx0zmxuuhyifkk83zwg7alcufr9jh5nxlijbn4ojjhfsmouyv3pf4iwtjv' );
define( 'SECURE_AUTH_SALT', '5d70mwyt9iaos3klfnsmx2pdyjsnej1adezhxihv1ig3nfccrwh0nypmuwd6bdzb' );
define( 'LOGGED_IN_SALT',   'taycehh0tjefrzvjzltbsnpjvbs5j3yxivkcngsbtfub9br0w3ztjsi3vzhvaeeb' );
define( 'NONCE_SALT',       '0ycjluhok2urejqef5ssxpjncnbijmawwagaenjqmtfhohdv6r63i21r3m0mu5r0' );

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
$table_prefix = 'wp6e_';

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
