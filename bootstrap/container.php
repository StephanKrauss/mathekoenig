<?php
	/**
	 * allgemeine Einstellungen
	 *
	 * @author Stephan krauss
	 * @since 20.11.2017 18:24
	 */

	// Datenbank
	$container['db'] = function($container) use($config)
	{
		$dsn = "mysql:host=".$config['db']['host'].";dbname=".$config['db']['dbname'].";charset=utf8";

		$db = new \Slim\PDO\Database($dsn, $config['db']['usr'], $config['db']['pwd']);

		return $db;
	};

	// Validator
	$container['validator'] = function(){
		$validator = new \App\Validator\GUMP('de');
		// $validator = \App\Validator\GUMP::get_instance();

		return $validator;
	};

	// View
	$container['view'] = function ($container) {
		$view = new \Slim\Views\Twig('./template', [
			'cache' => false
		]);

		// Instantiate and add Slim specific extension
		$basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
		$view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

		return $view;
	};

	// Error
	$container['errorHandler'] = function($c){
		return function ($request, $response,\Exception $exception) use ($c)
		{
			$errorMessage = 'Fehler';
			$errorMessage .= 'File: '.$exception->getFile().'<br>';
			$errorMessage .= 'Line: '.$exception->getLine().'<br>';
			$errorMessage .= 'Message: '.$exception->getMessage().'<br>';
			$errorMessage .= 'Code: '.$exception->getCode().'<br>';
			$errorMessage .= '------------------- <br>';

			$errorMessage .= nl2br($exception->getTraceAsString());

			$errorMessage .= '<br> -------------------';

			return $c['response']->withStatus(500)
				->withHeader('Content-Type', 'text/html')
				->write($errorMessage);
		};
	};
