<?php

	namespace App\Controller\Spielstand;

	use Slim\Http\Request;
	use Slim\Http\Response;

	/**
	 * Controller , Darstellung Spielstand
	 *
	 * @author Stephan Krauß
	 * @date 06.12.2017
	 * @file SpielstandController.php
	 */
	class SpielstandController
	{
		protected $database = null;

		/**
		 * SpielstandController constructor.
		 *
		 * @param \Slim\PDO\Database $database
		 */
		public function __construct(
			\Slim\PDO\Database $database
		)
		{
			$this->database = $database;
		}

		/**
		 * allgemeiner Aufruf
		 *
		 * @param \Slim\Http\Request $request
		 * @param \Slim\Http\Response $response
		 * @param array $params
		 *
		 * @throws \Exception
		 */
		public function __invoke(Request $request, Response $response, array $params)
		{
			try{
				$params = $_POST;
			}
			catch(\Exception $e){
				throw $e;
			}
		}

		protected function abfrageSpielstand()
		{



		}
	}