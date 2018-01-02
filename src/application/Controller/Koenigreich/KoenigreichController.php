<?php

	namespace App\Controller\Koenigreich;

	use Slim\Http\Request;
	use Slim\Http\Response;

	/**
	 * Anmeldung Controller
	 *
	 * @author Stephan Krauß
	 * @date 28.11.2017
	 * @file AnmeldenController.php
	 */
	class KoenigreichController
	{
		protected $view = null;
		protected $database = null;
		protected $validator = null;

		/**
		 * StartController constructor.
		 *
		 * @param \Slim\Tests\Views\Twig $view
		 */
		public function __construct(
			\Slim\Views\Twig $view,
			\Slim\PDO\Database $database,
			\App\Validator\Gump $validator
		)
		{
			$this->view = $view;
			$this->database = $database;
			$this->validator = $validator;
		}

		/**
		 * @param \Slim\Http\Request $request
		 * @param \Slim\Http\Response $response
		 * @param array $params
		 *
		 * @return \Psr\Http\Message\ResponseInterface
		 * @throws \Exception
		 */
		public function __invoke(Request $request, Response $response, array $params)
		{
			try{
				$templateVars = [];


				$koenigreich = $this->tabelleKoenigreich($this->database);

				$templateVars['koenigreich'] = $koenigreich;
				$templateVars['subtemplate'] = 'koenigreich';

				return $this->view->render( $response, 'main.tpl', $templateVars);

			}
			catch(\Exception $e){
				throw $e;
			}
		}

		/**
		 * erstellt den Inhalt der Tabelle Königreich
		 *
		 * @return array
		 */
		protected function tabelleKoenigreich(\Slim\PDO\Database $database)
		{
			$select = $database
				->select()
				->from('koenigreich')
				->orderBy('koenigreich');

			$stm = $select->execute();
			$koenigreich = $stm->fetchAll();

			return $koenigreich;
		}
	}