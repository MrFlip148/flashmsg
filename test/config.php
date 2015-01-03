<?php
/**
 * Sample configuration file for Anax webroot.
 *
 */


/**
 * Define essential Anax paths, end with /
 *
 */
define('ANAX_INSTALL_PATH', realpath(__DIR__ . '/../') . '/');
define('ANAX_APP_PATH',     ANAX_INSTALL_PATH . '/app/');


/**
 * Date timezone.
 *
 */
date_default_timezone_set('CET');

/**
 * Include autoloader.
 *
 */
include(ANAX_APP_PATH . '/../autoloader.php');



/**
 * Include global functions.
 *
 */
/*include(ANAX_INSTALL_PATH . 'src/functions.php');*/
