<?php

// Enable developer mode

$debug = true;   // change to false on production

if($debug) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}


// ** Database settings - You can get this info from your web host ** //

$currentDomain = $_SERVER['SERVER_NAME'];

define( 'DB_NAME', 'projectmanegmentdemo' );

/** Database database username */
define( 'DB_USER', 'root' );

/** Database database password */
define( 'DB_PASS', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );


/**#@-*/

/**
 * Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'projectmanegmentdemo_';

if ( defined( 'CLI' ) ) {
    $_SERVER['HTTP_HOST'] = 'localhost';
}

// define('SITEURL','http://' . $_SERVER['HTTP_HOST'] . '/');
// define('HOME','http://' . $_SERVER['HTTP_HOST'] . '/');

define('SITEURL','http://dplaner.local/');
define('HOME','http://dplaner.local/');



/* Do not edit passed this comment! */

/** Absolute path to the directory. */
if ( ! defined( 'ABSPATH' ) ) {
        define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Relative path to the directoy. */
if ( ! defined( 'REL_PATH' ) ) {
    define( 'REL_PATH', basename(dirname(__DIR__)) . '/' );
}

/** Sets up vars and included files. */
require_once( ABSPATH . 'settings.php' );

/** Hash for passwords */
$AUTH_HASH = '$6$rounds=5000$';
$AUTH_SALT = 'soj43rt4nrb873r32r3';
$AUTH_HNSC = $AUTH_HASH . $AUTH_SALT;
