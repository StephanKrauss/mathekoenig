<?php
/**
 * Bootstrap Mathekoenig
 *
 * @author Stephan Krauß
 * @date 20.11.2017
 * @file index.php
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (PHP_SAPI == 'cli-server') {
	// To help the built-in PHP dev server, check if the request was actually for
	// something which should probably be served as a static file
	$url  = parse_url($_SERVER['REQUEST_URI']);
	$file = __DIR__ . $url['path'];
	if (is_file($file)) {
		return false;
	}
}

include_once('../bootstrap/config.php');

include_once('../vendor/autoload.php');

$app = new Slim\App();
$container = $app->getContainer();

include_once('../bootstrap/container.php');

include_once('../bootstrap/dependencies.php');
include_once('../bootstrap/routes.php');

$app->run();