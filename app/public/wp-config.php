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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'p5D5MqGDkVPNse+fUZgdaKalpBhnyeXHrFqphUsE0AtyWJ2nBz0S4NmDX16g/c5D/6xY0RzH2FHtwKTM+UkQeA==');
define('SECURE_AUTH_KEY',  'aWeepNgApXiAarYSNlYigab+0JKrtO55/BvDQnRA5NKbduelQLC2gdKweUuK6baWo8TP7EcqJ+HPwy+tL+lksg==');
define('LOGGED_IN_KEY',    '+dmcFl/zlJ10YLp30nJkezp+pSUNROqPQwffQ9Z2xfC9mD2SKBKO6NKoKt2SprPhqGM13Gzb8ZwL7F1QRwe+Dg==');
define('NONCE_KEY',        'Y6os1KnCgkFtu1UPgEjq62b2IsqKj7zuwnCquGpUj14zcRPmbV8j/xcmmPOZmDbnw4+IsBcX8vU/VkiJvI5ElQ==');
define('AUTH_SALT',        'D5c9v/au8pGyQ5b+9xx2y6t8pBoRaTSgykvMgplVVFJB6BvzWMA6u/F+VDCSFCZJsc5wInvqjQaCSKQ6uyONRg==');
define('SECURE_AUTH_SALT', 'egwkUzAQwhlwTVh8mGn9yH6YkzrBPdqAhMOBI9uB3NgAa/zOiD6rMLGlxPCcwdJca+X0IZy+9ciQC3u/jrONEg==');
define('LOGGED_IN_SALT',   'eaLv2s6Ue80aX06O0fylf0y5RE2ADILYqlxBBwYAZAD7cNg2p+YKqzjMyB5bHcEBQfl3F9jV+yihZO5bjekZsg==');
define('NONCE_SALT',       'ToBAgq/HVFOuto9OUHF6qfRuP/hHQP3HV7pMn3jwaG2ket5w9e96cjZMJP8C63MMrdfudvx7dI0SIYghkYQu+w==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
