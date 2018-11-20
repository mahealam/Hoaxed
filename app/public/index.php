<?php
session_start();
/**
 * Hoaxed.me | Help each other by sharing opinions about nearby Business
 *
 * @package 
 * @author Muhammad Sheeahb
 * @link https://sheehab.me
 * @license http://opensource.org/licenses/MIT MIT License
 */

// TODO get rid of this and work with namespaces + composer's autoloader

// set a constant that holds the project's folder path, like "/var/www/".
// DIRECTORY_SEPARATOR adds a slash to the end of the path
define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
// set a constant that holds the project's "application" folder, like "/var/www/application".
define('APP', ROOT . 'application' . DIRECTORY_SEPARATOR);


// load application config (error reporting etc.)
require APP . 'config/config.php';

// FOR DEVELOPMENT: this loads PDO-debug, a simple function that shows the SQL query (when using PDO).
// If you want to load pdoDebug via Composer, then have a look here: https://github.com/panique/pdo-debug
require APP . 'libs/helper.php';
require APP . "libs/notifier/notifier.php";

// load application class
require APP . 'core/application.php';
require APP . 'core/controller.php';

// start the application
$app = new Application();
