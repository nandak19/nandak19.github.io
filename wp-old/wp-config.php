<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'fbchatsp_wp425');

/** MySQL database username */
define('DB_USER', 'fbchatsp_wp425');

/** MySQL database password */
define('DB_PASSWORD', 'X9m(P(S435');

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
define('AUTH_KEY',         'y9qhrhon3up6fso8sx53kp1gnusrib8bsx98aexfy8rv8xshxam0vbhudabh4fsi');
define('SECURE_AUTH_KEY',  '4ox8hf47bfdapppbat9420422bjgzsgnxavynrn07s8o0b8qs0zgfcgcged9m4r4');
define('LOGGED_IN_KEY',    '5mmrosjlolshvdujmvlvuumefxpfkb7ztc4kk9jobgvofcvmiwmdfsgy6u7um140');
define('NONCE_KEY',        'fmyzzn233cuuqqvwsxaieg1mrsxpvrkylmpvrbqkqcleeppzw1lf1ucehqluxhrv');
define('AUTH_SALT',        'pjdliawatcangwfdeivxisceifb6tejh01tpvwyomijafq4ljmwty7ooko1wueze');
define('SECURE_AUTH_SALT', '8m5tsecu3q9f617oyitah1twjqpyzdxfvhl98hqf23bk76csqwa5jcesklegw9sk');
define('LOGGED_IN_SALT',   'wj0qy7z5n5jajpl9p5gza3k9f6c9wy2bql9lsbq7ljnyu0h5tofd9sv4qssnco3q');
define('NONCE_SALT',       '8zrigesqev4nw8kpkksdqv2gskfk0aeufmqpdjgqbhhmogansvbm0afdidbxo3xj');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
